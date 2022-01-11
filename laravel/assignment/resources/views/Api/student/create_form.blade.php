@extends('Api.layouts.app')
@section('content')
<div class="form-detail">
  <div class="list-title">
    <h2>Add Record</h2>
  </div>
  <div class="create-alert">
  </div>
  @include('/common.errors')
  <form method="post" class="create-form">
    @csrf
    <div>
      <label>Name</label>
      <input type="text" placeholder="Enter Name" name="name" required>
      <label>Email</label>
      <input type="email" placeholder="Enter Email" name="email" required>
      <label>Major</label>
      <select name="major_id" class="major_id">
      </select>
      <label>Date Of Birth</label>
      <input type="text" placeholder="Enter Date Of Birth(Y/m/d)" name="dob" id="datepicker" required>
      <label>Address</label>
      <input type="text" placeholder="Enter Address" name="address" required>
      <button name="create" class="create-btn">Save</button>
    </div>
  </form>
</div>
@endsection