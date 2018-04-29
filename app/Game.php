<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Game extends Model {

    protected $fillable = [
        'name'
    ];

    public function heroes() {
        return $this->hasMany('App\Hero');
    }

    public function monsters_killed() {
        return $this->hasMany('App\MonsterKilled');
    }

    // BOOT
    // ----------------------------------------------------- //
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    static public function boot() {
        parent::boot();

        Game::created(function ($game) {
            for ($i = 0; $i < 4; $i++) {
                $hero = new Hero([
                    'type_id' => HeroType::first()->id,
                    'game_id' => $game->id
                ]);
                $hero->save();
            }
        });
    }
}
