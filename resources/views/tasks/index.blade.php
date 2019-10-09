@extends('layouts.app')

@section('content')
    <div class="container">
    @include('common.errors')
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <h1 class="text-center">Todo List</h1>

                <form action="{{ route('tasks.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <div class="col-md-9">
                          <input type="text" name="newTaskName" class="form-control" placeholder="Todo List">
                      </div>
                      <div class="col-md-3">
                          <input type="submit" class="btn btn-primary form-control" value="Add Task">
                      </div>
                    </div>
                </form>

                @if(count($tasks) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <th scope="row">{{ $task->id }}</th>
                                <td>
                                    <a href="{{ action('TaskController@show', $task) }}" class="btn btn-outline-secondary">{{ $task->name }}</a>
                                </td>
                                <td>
                                    <a href="{{ action('TaskController@edit', $task) }}" class="btn btn-outline-secondary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{  action('TaskController@destroy', $task) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-danger" value="Delete">
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
