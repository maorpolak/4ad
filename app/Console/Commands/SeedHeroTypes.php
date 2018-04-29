<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\HeroType;

class SeedHeroTypes extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:hero_types';

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
        $heroTypes = [
            'Warrior',
            'Cleric',
            'Rogue',
            'Wizard',
            'Barbarian',
            'Elf',
            'Dwarf',
            'Halfling'
        ];

        foreach ($heroTypes as $type) {
            $heroType = new HeroType(['type' => $type]);
            $heroType->save();
        }

        $this->info('Hero types added successfully!');
    }
}
