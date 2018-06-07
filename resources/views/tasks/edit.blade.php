@extends('layouts.app')

@section('content')

  <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6" >
    {!! Form::model($tasks, ['route' => ['tasks.update', $tasks->id], 'method' => 'put']) !!}
       
       <div class="form-group">
    　 {!! Form::label('title', 'タイトル:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    
    <div class="form-group">
        {!! Form::label('content', 'メッセージ:') !!}
        {!! Form::text('content', null, ['class' => 'form-control']) !!}
    </div>

        {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
     </div>
      </div>

@endsection