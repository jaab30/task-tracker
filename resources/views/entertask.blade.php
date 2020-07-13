@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4 text-center">Enter a new task</h1>
            <form method="post" action="{{ route('tasks.store')}}">
                <div class="form-group">
                    <label for="task-title">Task Title</label>
                    <input type="text" name="title" class="form-control" id="task-title" placeholder="Do the lawn">
                </div>        
                <div class="form-group">
                    <label for="task-description">Task Description</label>
                    <textarea name="description" class="form-control" id="task-description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-dark mb-2">Add Task</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>



@endsection