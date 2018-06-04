@extends('layouts.app')

@section('content')



    {!! Form::model($tasks, ['route' => ['tasks.update', $tasks->id], 'method' => 'put']) !!}
       
        {!! Form::label('title', 'タイトル:') !!}
        {!! Form::text('title') !!}

        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}

@endsection