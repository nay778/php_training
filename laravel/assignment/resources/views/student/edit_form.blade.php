@extends('layouts.app')
@section('content')
<div class="form-detail">
  <div class="list-title">
    <h2>Edit Record</h2>
  </div>
  <form method="post" action="{{ route('update.student',$student->id) }}">
    @csrf
    @method('PUT')
    <div>
      <label>Name</label>
      <input type="text" placeholder="Enter Name" name="name" required value="{{$student->name}}">
      <label>Email</label>
      <input type="email" placeholder="Enter Email" name="email" required value="{{$student->email}}">
      <label>Major</label>
      <select name="major_id">
        @foreach ($majors as $key => $value)
        @if($student->major_id == $key)
        <option value="{{ $key }}" selected>
          {{ $value }}
        </option>
        @else
        <option value="{{ $key }}">
          {{ $value }}
        </option>
        @endif
        @endforeach
      </select>
      </select>
      <label>Address</label>
      <input type="text" placeholder="Enter Address" name="address" required value="{{$student->address}}">
      <button type="submit" name="create">Save</button>
    </div>
  </form>
</div>
@endsection