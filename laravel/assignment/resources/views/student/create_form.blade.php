@extends('layouts.app')
@section('content')
<div class="form-detail">
  <div class="list-title">
    <h2>Add Record</h2>
  </div>
  @include('/common.errors')
  <form method="post" action="{{ route('create.student') }}">
    @csrf
    <div>
      <label>Name</label>
      <input type="text" placeholder="Enter Name" name="name">
      <label>Email</label>
      <input type="email" placeholder="Enter Email" name="email">
      <label>Major</label>
      <select name="major_id">
        @foreach ($majors as $key => $value)
        <option value="{{ $key }}">
          {{ $value }}
        </option>
        @endforeach
      </select>
      <label>Address</label>
      <input type="text" placeholder="Enter Address" name="address">
      <button type="submit" name="create">Save</button>
    </div>
  </form>
</div>
@endsection