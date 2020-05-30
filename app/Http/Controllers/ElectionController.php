<?php

namespace App\Http\Controllers;

use App\Election;
use Illuminate\Http\Request;

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

        return redirect('/election')->with('Info',$election->title . " has changed status to " . $request['status']);
    }

    public function results(Election $election) {
        return view('elections.results', compact('election'));
    }

    public function viewAsMember() {
        $election = Election::whereIn('status', ['nomination','election'])->first();
        return view('elections.index', compact('election'));
    }
}
