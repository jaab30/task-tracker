@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center text-white bg-success p-3 mt-3">
            <h1 class="display-4"> Enter a New Task </h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-light text-dark text-center">New Task</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <h1 class="display-5 text-center mb-3">Pending Tasks</h1>
            @foreach($tasks as $task)
                @if ($task->completed === 0)
                <div class="card mb-3 border-success">
                    <div class="card-body card-{{$task->id}}">
                        <div class="row">
                            <div class="col-md-12 text-right">
                            <i class="fas fa-check text-success task-update-pending task-icon" data-id="{{ $task->id}}"></i>
                            <i class="fas fa-edit text-info ml-2 mr-2 task-edit task-icon" data-id="{{ $task->id}}" data-toggle="modal" data-target="#edit-modal"></i>
                            <i class="far fa-trash-alt text-danger task-delete task-icon" data-id="{{ $task->id }}"></i>
                            </div>
                        </div>
                        <h5 class="card-title bg-light p-2 border-success">{{ $task->title }}</h5>
                        <p class="card-description card-text bg-light p-2 m-0">{{ $task->description }}</p>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <p class="card-text text-left"><small class="text-muted">Created on: {{date_format($task->created_at, 'm/d/Y')}}</small></p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text text-right"><small class="text-muted">Updated on: {{date_format($task->updated_at, 'm/d/Y')}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <div class="col-md-6">
            <h1 class="display-5 text-center mb-3">Completed Tasks</h1> 
            @foreach($tasks as $task)
                @if ($task->completed === 1)
                <div class="card mb-3 border-dark">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                            <i class="far fa-arrow-alt-circle-left mr-2 text-dark task-update-completed task-icon" data-id="{{ $task->id }}"></i>
                            <i class="far fa-trash-alt text-danger task-delete task-icon" data-id="{{ $task->id }}"></i>
                            </div>
                        </div>
                        <h5 class="card-title bg-light p-2 border-success">{{ $task->title }}</h5>
                        <p class="card-text bg-light p-2 m-0">{{ $task->description }}</p>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <p class="card-text text-left"><small class="text-muted">Created on: {{date_format($task->created_at, 'm/d/Y')}}</small></p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text text-right"><small class="text-muted">Updated on: {{date_format($task->updated_at, 'm/d/Y')}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit-modalLabel">Update Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tasks/update" method="POST">
            <input class="form-control update-title" type="text" name="title">
            <textarea name="description" class="form-control update-description mt-2" rows="3"></textarea>
        </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary modal-submit">Save changes</button>
      </div>
      </div>
      
    </div>
  </div>
</div>



@endsection