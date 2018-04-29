<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToMonstersKilledTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('monsters_killed', function (Blueprint $table) {
            $table->string('comments')->nullable()->after('game_id');
            $table->integer('number')->after('game_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monsters_killed', function (Blueprint $table) {
            $table->dropColumn('comments');
            $table->dropColumn('number');
        });
    }
}
