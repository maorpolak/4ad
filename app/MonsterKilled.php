<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonsterKilled extends Model {

    protected $table = 'monsters_killed';

    protected $fillable = [
        'monster_type_id',
        'game_id',
        'name',
        'number',
        'comments'
    ];

    protected $appends = [
        'type'
    ];

    public function monsterType() {
        return $this->belongsTo('App\MonsterType');
    }

    public function getTypeAttribute() {
        return $this->monsterType->type;
    }
}
