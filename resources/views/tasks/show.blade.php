@extends('layouts.app')

@section('content')

<h1>id = {{ $tasks->id }} のメッセージ詳細ページ</h1>
   <p>タイトル: {{ $tasks->title }}</p>
   
    <p>メッセージ: {{ $tasks->content }}</p>
    

    {!! link_to_route('tasks.edit', 'このメッセージを編集', ['id' => $tasks->id]) !!}
    {!! Form::model($tasks, ['route' => ['tasks.destroy', $tasks->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}

@endsection