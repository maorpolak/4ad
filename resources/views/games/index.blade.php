@extends('layout')

@section('content')

    <div class="col-md-12 text-center">
        <h1 class="lead">Four Against Darkness</h1>
    </div>
    <div class="col-md-12">
        <table class="table table-responsive" id="campaignsTable">
            <tr>
                <th>ID</th>
                <th>Campaign Name</th>
            </tr>
        </table>
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
@endsection