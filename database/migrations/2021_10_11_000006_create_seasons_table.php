<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('seasons')) {
            Schema::create('seasons', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('league_id')->unsigned();
                $table->string('name');
                $table->date('start_date');
                $table->date('end_date');
                $table->timestamps();

                //foreign key constraints
                $table->foreign('league_id')->references('id')->on('leagues')
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
        Schema::dropIfExists('seasons');
    }
}
