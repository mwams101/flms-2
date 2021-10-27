<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tables')) {
            Schema::create('tables', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('season_id')->unsigned();
                $table->integer('club_id')->unsigned();
                $table->integer('matches_played');
                $table->integer('won');
                $table->integer('drawn');
                $table->integer('lost');
                $table->integer('goals_scored');
                $table->integer('goals_conceded');
                $table->integer('goal_difference');
                $table->integer('points');
                $table->timestamps();

                //foreign key constraints
                $table->foreign('season_id')->references('id')->on('seasons')
                    ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('club_id')->references('id')->on('clubs')
                    ->onUpdate('cascade')->onDelete('cascade');


            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables');
    }
}
