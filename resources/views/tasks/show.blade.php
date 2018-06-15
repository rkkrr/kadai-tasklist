@extends('layouts.app')

@section('content')

<h1>id = {{ $tasks->id }} のタスク詳細ページ</h1>

 <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6" >
        
     <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $tasks->id }}</td>
        </tr>
        <tr>
            <th>タイトル</th>
            <td>{{ $tasks->staus }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $tasks->content }}</td>
        </tr>
    </table>
    </div>
   </div>
    {!! link_to_route('tasks.edit', 'このメッセージを編集', ['id' => $tasks->id], ['class' => 'btn btn-default']) !!}
    {!! Form::model($tasks, ['route' => ['tasks.destroy', $tasks->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection