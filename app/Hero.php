<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model {
    protected $fillable = [
        'name',
        'type_id',
        'game_id',
        'life',
        'attack_roll',
        'defense_roll',
        'gp',
        'abilities',
        'equipment',
        'clues'
    ];
}
