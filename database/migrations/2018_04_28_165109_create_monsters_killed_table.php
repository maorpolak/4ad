<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonstersKilledTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monsters_killed', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('monster_type_id')->unsigned();
            $table->integer('game_id')->unsigned();
            $table->timestamps();

            $table->foreign('monster_type_id')
                ->references('id')
                ->on('games');

            $table->foreign('game_id')
                ->references('id')
                ->on('games');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monsters_killed');
    }
}
