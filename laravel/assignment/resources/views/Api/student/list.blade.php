@extends('Api.layouts.app')
@section('content')

<div class="table-data list-modal">
  <div class="list-title">
    <h2>Student lists</h2>
  </div>
  <table border="1">
    <thead>
      <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Major</th>
        <th>DOB</th>
        <th>Address</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody class="list"></tbody>
  </table>
</div>
<!--create form-->
<div class="form-detail create-modal">
  <div class="list-title">
    <h2>Add Record</h2>
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
<!--edit form-->
<div class="form-detail edit-modal">
  <div class="list-title">
    <h2>Edit Record</h2>
  </div>
  <form method="post" class="edit-form">
    @csrf
    @method('PUT')
    <div>
      <input type="hidden" name="id" required class="id">
      <label>Name</label>
      <input type="text" placeholder="Enter Name" name="name" required class="name">
      <label>Email</label>
      <input type="email" placeholder="Enter Email" name="email" required class="email">
      <label>Major</label>
      <select name="major_id" class="major_id">
      </select>
      <label>Address</label>
      <input type="text" placeholder="Enter Address" name="address" required class="address">
      <button name="create" class="edit-btn">Update</button>
    </div>
  </form>
</div>
@endsection