@extends('layouts.bootstrap')

@section('body')
    <div class="pb-2">
        <div class="card">
            <div class="card-body">
                <form action="/task/add" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-lg" id="taskName" name="name"
                            placeholder="Add new...">
                        <input type="submit" class="btn btn-primary input-group-text" id="addTaskButton" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr class="my-3">

    <div class="mb-3 pb-3">
        <form action="{{ route('tasks') }}" method="get">
            <div class="row align-items-end row-gap-2">
                <div class="col-sm-3">
                    <span class="small mb-0 text-muted">Search</span>
                    <input type="text" class="form-control" name="search" value="{{ app('request')->input('search') }}">
                </div>
                <div class="col-sm-3">
                    <span class="small mb-0 text-muted">Status</span>
                    <select class="form-select" name="status">
                        <option value="" {{ (app('request')->input('status') == '') ? 'selected' : '' }}>All Statuses</option>
                        <option value="toDo" {{ (app('request')->input('status') == 'toDo') ? 'selected' : '' }} class="text-muted">To Do</option>
                        <option value="inProgress" {{ (app('request')->input('status') == 'inProgress') ? 'selected' : '' }} class="text-primary">In Progres</option>
                        <option value="completed" {{ (app('request')->input('status') == 'completed') ? 'selected' : '' }} class="text-success">Completed</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <p class="small mb-0 text-muted">Priority</p>
                    <select class="form-select" class="priority" name="priority">
                        <option value="" {{ (app('request')->input('priority') == '') ? 'selected' : '' }}>All</option>
                        <option value="high" {{ (app('request')->input('priority') == 'high') ? 'selected' : '' }}>High</option>
                        <option value="medium" {{ (app('request')->input('priority') == 'medium') ? 'selected' : '' }}>Medium</option>
                        <option value="low" {{ (app('request')->input('priority') == 'low') ? 'selected' : '' }}>Low</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="submit" value="Search" class="btn btn-primary w-100">
                </div>
            </div>
        </form>
    </div>

    <div class="mt-2">
        @foreach ($tasks as $task)
            <div class="row align-items-center my-2 border-bottom row-gap-2 pb-3">
                <div class="col-sm-4 col-md-5 col-lg-6 fw-normal h5 text-truncate">
                    {{ $task->name }}
                </div>
                <div class="col-sm-8 col-md-7 col-lg-6 d-flex justify-content-end">
                    @switch($task->status)
                        @case('toDo')
                            <span class="badge rounded-pill text-bg-secondary me-2">To Do</span>
                        @break
                        @case('inProgress')
                            <span class="badge rounded-pill text-bg-primary me-2">In Progress</span>
                        @break
                        @case('completed')
                            <span class="badge rounded-pill text-bg-success me-2">Completed</span>
                        @break
                    @endswitch

                    @switch($task->priority)
                        @case('high')
                            <i class="fa fa-flag text-danger me-2 mt-1"></i>
                        @break
                        @case('medium')
                            <i class="fa fa-flag text-warning me-2 mt-1"></i>
                        @break
                        @case('low')
                            <i class="fa fa-flag text-primary me-2 mt-1"></i>
                        @break
                    @endswitch

                    @if( $task->remind_before )
                        <i class="fas fa-clock text-warning-emphasis mt-1 me-2 me-md-3"></i>
                    @endif

                    @if( $task->due_date )
                        <i class="fas fa-hourglass-half me-2 text-warning mt-1"></i>
                        <span class="me-4 small d-none d-sm-block">{{ date('jS M Y', strtotime($task->due_date)) }}</span>
                    @endif

                    <a href="/task/edit/{{ $task->id }}"><i class="fas fa-pencil-alt me-2"></i></a>
                    <a data-taskid="{{ $task->id }}" data-taskname="{{ $task->name }}" data-bs-toggle="modal" data-bs-target="#taskDeleteModal" class="cursor-pointer"><i class="fas fa-trash-alt text-danger"></i></a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('modals')
    @include('tasks.delete-modal')
@endsection
