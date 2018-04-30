@extends('layout')

@section('content')

    <div class="col-md-12" id="partySheet">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="lead">Play Sheet</h1>
            </div>
            <form id="gameForm" data-api-call="/game{{ isset($game) ? "/$game->id" : '' }}" data-method="POST" data-reset-form="false" class="form-horizontal">
                {!! Form::hidden('game_id', $game->id, ['id' => 'gameId']) !!}
                @if (!$game->heroes->isEmpty())
                    @foreach ($game->heroes as $hero)
                        @include('partials/hero_partial', ['hero' => $hero, 'heroTypes' => $heroTypes])
                        <hr/>
                    @endforeach
                @else
                    @for ($i = 0; $i < 4; $i++)
                        @include('partials/hero_partial', ['hero' => null, 'heroTypes' => $heroTypes])
                        <hr/>
                    @endfor
                @endif
                <div class="form-group text-center">
                    <button role="button" class="btn btn-default" form="gameForm" id="saveGameFormBtn">
                        Save
                    </button>
                </div>
            </form>

            <div class="col-md-12 text-center">
                <h2 class="lead">Monsters Killed</h2>
            </div>
            <div class="col-md-12">
                <table class="table table-responsive table-striped" id="monstersKilledTable">
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Number</th>
                        <th>Comments</th>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <form id="monsterKillForm" data-api-call="/game/logMonsterKill{{ isset($game) ? "/$game->id" : '' }}" data-method="POST" data-reset-form="false" class="form-horizontal">
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-3">
                            {!! Form::text('name', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                        </div>
                        {!! Form::label('monster_type_id', 'Monster Type', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-3">
                            {!! Form::select('monster_type_id', $monsterTypes, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('number', 'How many?', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-3">
                            {!! Form::text('number', null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::label('comments', 'Comments', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-3">
                            {!! Form::text('comments', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-md-12">
                            <button role="button" class="btn btn-default" form="monsterKillForm" id="logMonsterKillBtn">
                                Log monster kill
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
@endsection