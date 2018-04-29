<?php

namespace App\Http\Controllers;

use App\Game;
use App\HeroType;
use App\MonsterKilled;
use App\MonsterType;
use Illuminate\Http\Request;

class GamesController extends Controller {

    public function index() {
        $games = Game::all();
        return view('games/index', compact('games'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $game = new Game(['name' => $request->get('name')]);
        $game->save();

        return response()->json();
    }

    public function show($id) {
        $game = Game::with('heroes')->with('monsters_killed')->find($id);
        $heroTypes = HeroType::all()->pluck('type', 'id');
        $monsterTypes = MonsterType::all()->pluck('type', 'id');

        return view('games/game', compact('game', 'heroTypes', 'monsterTypes'));
    }

    public function save(Request $request, $id) {

        $input = $request->only(
            'name',
            'type_id',
            'level',
            'life',
            'attack_roll',
            'defense_roll',
            'gp',
            'abilities',
            'equipment',
            'clues'
        );
        $keys = array_keys($input);

        $game = Game::with('heroes')->with('monsters_killed')->find($id);

        if (!isset($game)) {
            $game = new Game;
            $game->save();

            for ($i = 0; $i < 4; $i++) {
                $hero = new Hero(['game_id' => $game->id]);

                foreach ($keys as $key) {
                    $hero[$key] = $input[$key][$i];
                }

                $hero->save();
            }

        } else {
            foreach ($game->heroes as $index => $hero) {
                foreach ($keys as $key) {
                    $hero[$key] = $input[$key][$index];
                }

                $hero->save();
            }
        }

        return response()->json();

    }

    public function logMonsterKill(Request $request, $id) {

        $request->validate([
            'name' => 'required',
            'number' => 'required|integer',
        ]);

        $input = $request->only(
            'monster_type_id',
            'name',
            'number',
            'comments'
        );

        $input['game_id'] = $id;

        $monsterKilled = new MonsterKilled($input);

        $monsterKilled->save();

        return response()->json();

    }

    public function getMonstersKilled(Request $request, $id) {
        $monsterKilled = MonsterKilled::with('monsterType')->where('game_id', '=', $id)->get();

        return response()->json($monsterKilled);
    }

    public function deleteMonsterKilled(Request $request, $id) {
        MonsterKilled::where('id', '=', $id)->delete();

        return response()->json();
    }
}
