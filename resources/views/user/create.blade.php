@extends('layouts.master')

@section('content')

<h1>Add a New User data</h1>
<hr>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

{!! Form::open(['route' => 'User.store']) !!}

<div class="form-group">
    {!! Form::label('title', 'ID:', ['class' => 'control-label']) !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'langtitude:', ['class' => 'control-label']) !!}
    {!! Form::text('langtitude', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'latitude:', ['class' => 'control-label']) !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'userNumber:', ['class' => 'control-label']) !!}
    {!! Form::text('userNumber', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'address:', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'userFK:', ['class' => 'control-label']) !!}
    {!! Form::text('userFK', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New User data', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop