<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Todo List App</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h1 class="text-center">Todo List</h1>

            {{-- tasks.store --}}
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

            {{-- Table --}}
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
                            <td>{{ $task->name }}</td>
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
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
