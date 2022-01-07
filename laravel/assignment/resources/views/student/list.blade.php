@extends('layouts.app')
@section('content')

<div class="table-data">
  <div class="list-title">
    <h2>Student lists</h2>
  </div>
  <table border="1">
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

    @if (count($lists) > 0)
    @foreach ($lists as $list)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $list->name }}</td>
      <td>{{ $list->email }}</td>
      <td>{{ $list->major->name }}</td>
      <td>{{ $list->dob }}</td>
      <td>{{ $list->address }}</td>
      <td class="text-center"><a href="{{ route('edit',$list->id) }}"><i class="far fa-edit text-priamry"></i></a></td>
      <td class="text-center"><a href="{{ route('delete',$list->id) }}"><i class="fas fa-trash-alt text-danger"></i></a></td>
    </tr>
    @endforeach
    @else
    <tr>
      <td colspan="7">No Data Found</td>
    </tr>
    @endif
  </table>
</div>
@endsection