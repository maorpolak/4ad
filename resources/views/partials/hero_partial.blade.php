<div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {!! Form::text('name[]', isset($hero) ? $hero->name : '', ['class' => 'form-control']) !!}
    </div>
    {!! Form::label('type_id', 'Class', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {{ Form::select('type_id[]', $heroTypes, isset($hero) ? $hero->type_id : 1, ['class' => 'form-control'])  }}
    </div>
</div>
<div class="form-group">
    {!! Form::label('level', 'Level', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {!! Form::text('level[]', isset($hero) ? $hero->level : '', ['class' => 'form-control']) !!}
    </div>
    {!! Form::label('life', 'Life', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {!! Form::text('life[]', isset($hero) ? $hero->life : '', ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('attack_roll', 'Attack Roll', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {!! Form::text('attack_roll[]', isset($hero) ? $hero->attack_roll : '', ['class' => 'form-control']) !!}
    </div>
    {!! Form::label('defense_roll', 'Defense Roll', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {!! Form::text('defense_roll[]', isset($hero) ? $hero->defense_roll : '', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('abilities', 'Abilities', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {!! Form::textarea('abilities[]', isset($hero) ? $hero->abilities : '', ['size' => '30x5', 'class' => 'form-control']) !!}
    </div>
    {!! Form::label('equipment', 'Equipment', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {!! Form::textarea('equipment[]', isset($hero) ? $hero->equipment : '', ['size' => '30x5', 'class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('clues', 'Clues', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {!! Form::textarea('clues[]', isset($hero) ? $hero->clues : '', ['size' => '50x5', 'class' => 'form-control']) !!}
    </div>
    {!! Form::label('gp', 'GP', ['class' => 'control-label col-md-2']) !!}
    <div class="col-md-3">
        {!! Form::text('gp[]', isset($hero) ? $hero->gp : '', ['class' => 'form-control']) !!}
    </div>
</div>
