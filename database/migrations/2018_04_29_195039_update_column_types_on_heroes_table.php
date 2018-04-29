<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnTypesOnHeroesTable extends Migration
{
    public function up() {
        Schema::table('heroes', function (Blueprint $table) {
            $table->string('attack_roll')->change();
            $table->string('defense_roll')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('heroes', function (Blueprint $table) {
            $table->integer('attack_roll')->change();
            $table->integer('defense_roll')->change();
        });
    }
}
