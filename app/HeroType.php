<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeroType extends Model {

    protected $fillable = ['type'];

    public $timestamps = false;
}
