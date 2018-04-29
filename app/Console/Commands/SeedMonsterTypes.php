<?php

namespace App\Console\Commands;

use App\MonsterType;
use Illuminate\Console\Command;
use App\HeroType;

class SeedMonsterTypes extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:monster_types';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds hero types to the DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $monsterTypes = [
            'Minion',
            'Vermin',
            'Weird',
            'Boss',
        ];

        foreach ($monsterTypes as $type) {
            $monsterType = new MonsterType(['type' => $type]);
            $monsterType->save();
        }

        $this->info('Monster types added successfully!');
    }
}
