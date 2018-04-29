@extends('layout')

@section('content')

    <div class="col-md-12 text-center">
        <h1 class="lead">Four Against Darkness</h1>
    </div>
    <div class="col-md-12">
        <form id="newGameForm" data-api-call="/game" data-method="POST" class="form-horizontal">
            <div class="form-group">
                {!! Form::label('name', 'Name', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-3">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                    <button role="button" class="btn btn-default" form="newGameForm">
                        Create New Campaign
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 text-center">
        <h3 class="lead">Campaigns</h3>
    </div>
    <div class="col-md-12" id="gamesTable">
        @foreach ($games as $game)
            <div class="row">
                <div class="col-md-2">
                    {{ $game->id }}
                </div>
                <div class="col-md-4">
                    <a href="{{ URL::to('game/') . '/' . $game->id }}">
                        {{ $game->name }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>

@endsection