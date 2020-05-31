<?php

namespace App\Http\Controllers;

use App\Election;
use App\Nomination;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElectionController extends Controller
{
    public function index() {
        $user = auth()->user();

        $election = Election::whereIn('status', ['nomination','election'])->first();

        if($user->role=="admin") {
            $elections = Election::orderBy('created_at','desc')->get();
            return view('elections.manager', [
                'election' => $election,
                'elections' => $elections
            ]);
        }else {
            return view('elections.index', compact('election'));
        }
    }

    public function create() {
        return view('elections.create');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'title' => 'required',
            'status' => 'required'
        ]);

        Election::create([
            'title' => $request['title'],
            'status' => $request['status'],
            'no_of_candidates' => $request['no_of_candidates'],
            'status_at' => date('Y-m-d h:i:s')
        ]);

        return redirect('/election')->with('Info','An election has been created.');
    }

    public function show(Election $election) {
        $next = "";
        $message = '';
        switch($election->status) {
            case 'pending' : $next = 'nomination'; $message="Proceed with nomination"; break;
            case 'nomination': $next = 'election'; $message="Proceed with election"; break;
            case 'election' : $next = 'closed'; $message="Close the election "; break;
        }

        return view('elections.view', [
            'election' => $election,
            'next' => $next,
            'message' => $message
        ]);
    }

    public function update(Election $election, Request $request) {
        $this->validate($request,[
            'title' => 'required',
        ]);

        $election->update(['title'=>$request['title']]);
    }

    public function changeStatus(Request $request) {
        $election = Election::findOrFail($request['id']);
        $election->status = $request['status'];
        $election->save();

        //nullify voted_at and nominated_at if nomination is activated.
        if($election->status=="nomination") {
            DB::table('users')->update(['voted_at'=>null, 'nominated_at'=>null]);
        }

        return redirect('/election')->with('Info',$election->title . " has changed status to " . $request['status']);
    }

    public function results(Election $election) {
        return view('elections.results', compact('election'));
    }

    public function viewAsMember() {
        $election = Election::whereIn('status', ['nomination','election'])->first();
        return view('elections.index', compact('election'));
    }

    public function nominate(Request $request) {
        $election = Election::findOrFail($request['election_id']);

        $count = count($request['check']);
        $limit = $election->no_of_candidates;

        if($limit < $count) {
            return redirect()->back()->with('Error',"Sorry! Somehow you have submitted $count nominations which
                is more than the current limit of $limit. This should not have been possible
                under normal circumstances. Please go back and refrain from tweaking the system.");
        }

        $nominees = [];

        foreach($request['check'] as $n) {
            $nominees[] = User::find($n);
        }

        return view('elections.confirm_nomination',[
            'election' => $election,
            'nominees' => $nominees
        ]);
    }

    public function confirmNomination(Request $request) {
        $election = Election::findOrFail($request['election_id']);
        $limit = $election->no_of_candidates;
        $count = count($request['nominee']);

        if($limit < $count) {
            return redirect()->back()->with('Error',"Sorry! Somehow you have submitted $count nominations which
                is more than the current limit of $limit. This should not have been possible
                under normal circumstances. Please go back and refrain from tweaking the system.");
        }

        $user = User::findOrFail(auth()->user()->id);

        foreach($request['nominee'] as $n) {
            Nomination::create([
                'user_id' => $user->id,
                'nominee' => $n,
                'election_id' => $election->id
            ]);
        }

        $user->nominated_at = date('Y-m-d h:i:s');
        $user->save();

        return redirect('/election')->with('Info','You have successfully placed your nomination.');
    }
}
