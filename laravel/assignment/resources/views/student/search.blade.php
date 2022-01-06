@extends('layouts.app')
@section('content')

<div class="table-data">
  <div class="list-title d-block">
    <h2 class="text-center">Search Records</h2>
    <form action="{{ route('search')}}" method="POST" class="row g-3 search-form">
      @csrf  
    <div class="col-auto">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name">
      </div>
      <div class="col-auto">
        <label for="start">Start Date</label>
        <input type="text" class="form-control" name="start" id="datepicker" placeholder="y/m/d">
      </div>
      <div class="col-auto">
        <label for="end">End Date</label>
        <input type="text" class="form-control" name="end"  id="datepick" placeholder="y/m/d">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
      </div>
    </form>
  </div>

  @if (count($lists) > 0)
  <table border="1">
    <tr>
      <th>S.N</th>
      <th>Name</th>
      <th>Email</th>
      <th>Major</th>
      <th>Address</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    @foreach ($lists as $list)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $list->name }}</td>
      <td>{{ $list->email }}</td>
      <td>{{ $list->major_name }}</td>
      <td>{{ $list->address }}</td>
      <td class="text-center"><a href="{{ route('edit',$list->id) }}"><i class="far fa-edit"></i></a></td>
      <td class="text-center"><a href="{{ route('delete',$list->id) }}"><i class="fas fa-trash-alt"></i></a></td>
    </tr>
    @endforeach
  </table>
  @endif
</div>
@endsection