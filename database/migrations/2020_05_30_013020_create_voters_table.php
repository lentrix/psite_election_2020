<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('election_id')->unsigned();
            $table->timestamp('nominated_at')->nullable(); //the date this voters executed a nomination
            $table->integer('nominations')->default(0);
            $table->timestamp('voted_at')->nullable();
            $table->integer('votes')->default(0);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('election_id')->references('id')->on('elections');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voters');
    }
}
