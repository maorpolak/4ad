<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeroesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->integer('game_id')->unsigned();
            $table->string('name')->nullable();
            $table->integer('defense_roll')->nullable();
            $table->integer('attack_roll')->nullable();
            $table->text('abilities')->nullable();
            $table->string('gp')->nullable();
            $table->text('equipment')->nullable();
            $table->text('clues')->nullable();
            $table->integer('level')->nullable();
            $table->integer('life')->nullable();
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')
                ->on('hero_types');

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
        Schema::dropIfExists('heroes');
    }
}
