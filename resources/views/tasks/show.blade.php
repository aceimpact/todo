@extends('layouts.app')

@section('content')
<div class="panel-heading">
        {{ $task->name }}
</div>
<div class="form-group">
    <a href="{{ route('tasks.index') }}" class="btn btn-danger float-right">戻る</a>
</div>
@endsection
