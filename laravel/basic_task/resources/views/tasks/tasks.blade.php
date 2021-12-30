@extends('layouts.app')
@section('content')
<div class="container mt-2">
  <div class="panel-body">
    <div class="panel-heading">
      New Task
    </div>
    @include('/common.errors')
    <!-- New Task Form -->
    <form action="/task" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <!-- Task Name -->
      <div class="form-group">
        <label for="task" class="col-sm-3 control-label">Task</label>

        <div class="col-sm-6">
          <input type="text" name="name" id="task-name" class="form-control">
        </div>
      </div>

      <!-- Add Task Button -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn">
            +Add Task
          </button>
        </div>
      </div>
    </form>
  </div>

  @if (count($tasks) > 0)
  <div class="panel-body">
    <div class="panel-heading">
      Current Tasks
    </div>

    <div>
      <table class="table table-striped task-table">

        <!-- Table Headings -->
        <thead>
          <th>Task</th>
          <th>&nbsp;</th>
        </thead>

        <!-- Table Body -->
        <tbody>
          @foreach ($tasks as $task)
          <tr>
            <!-- Task Name -->
            <td class="table-text">
              <div>{{ $task->name }}</div>
            </td>

            <td>
              <!-- Delete Button -->
            <td>
              <form action="/task/{{ $task->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button class="btn">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>
@endsection