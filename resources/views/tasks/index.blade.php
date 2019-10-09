@extends('layouts.app')

@section('content')
    <div class="container">
    @include('common.errors')
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <h1 class="text-center">Todoリスト</h1>
                <form action="{{ route('tasks.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <div class="col-md-9">
                          <textarea name="newTaskName" class="form-control" placeholder="Todo"></textarea>
                      </div>
                      <div class="col-md-3">
                          <input type="submit" class="btn btn-primary form-control" value="タスクを追加">
                      </div>
                    </div>
                </form>

                @if(count($tasks) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">やること</th>
                                <th scope="col">編集</th>
                                <th scope="col">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>

                                <td>
                                    <a href="{{ action('TaskController@show', $task) }}" class="btn btn-outline-secondary">{{ $task->name }}</a>
                                </td>
                                <td>
                                    <a href="{{ action('TaskController@edit', $task) }}" class="btn btn-success">編集する</a>
                                </td>
                                <td>
                                    <form action="{{  action('TaskController@destroy', $task) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-danger" value="削除する">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
