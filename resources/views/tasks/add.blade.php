@extends('layouts.bootstrap')

@section('body')
    <div class="pb-2 h3">
        Create Task
    </div>

    <hr class="my3">

    <form action="/task" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Task Name <span class="text-danger">*</span> </label>
            <input type="text" name="name" class="form-control" placeholder="Add new..." required
                value="{{ $name }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" class="form-control" placeholder="Describe it..."></textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" aria-label="Select Status">
                <option selected value="toDo" class="text-muted">To Do</option>
                <option value="inProgress" class="text-primary">In Progres</option>
                <option value="completed" class="text-success">Completed</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Priority</label>
            <div class="input-group">
                <span class="input-group-text"> <i class="fa fa-flag text-muted" id="priorityFlag"></i>
                </span>
                <select class="form-select" name="priority" id="prioritySelector" aria-label="Select Priority">
                    <option selected value="na">Select Priority</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            @error('priority')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-hourglass-half text-warning"></i></span>
                <input type="date" name="dueDate" class="form-control" placeholder="Add new...">
            </div>
            @error('dueDate')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Remind me</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-clock text-warning-emphasis"></i></span>
                <select class="form-select" name="remindBefore" aria-label="Don't Remind">
                    <option selected value="0">Don't Remind</option>
                    <option value="1">1 day before</option>
                    <option value="2">2 days before</option>
                    <option value="3">3 days before</option>
                </select>
            </div>
            @error('remindBefore')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-end">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
@endsection
