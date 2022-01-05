@extends('layouts.app')
@section('content')

<div class="table-data">
  <div class="list-title">
    <h2>Student lists</h2>
    <h2>
      <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="import">
        @csrf
        <input type="file" name="file"  accept=".xls,.xlsx" required>
        <button type="submit" class="btn-import" name="import"><i class="fas fa-cloud-upload-alt"></i></button>
      </form>
      <a href="{{ route('create') }}" class="m-r" title="add"><i class="far fa-plus-square"></i></a>
      <a href="{{ route('export') }}" class="m-r b-color" title="download excel file"><i class="fas fa-cloud-download-alt"></i></a>
      <a href="{{ asset('sample/sample.xlsx') }}" download class="sample" title="download sample excel file">sample excel file</a>
    </h2>
  </div>
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

    @if (count($lists) > 0)
    @foreach ($lists as $list)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $list->name }}</td>
      <td>{{ $list->email }}</td>
      <td>{{ $list->major->name }}</td>
      <td>{{ $list->address }}</td>
      <td class="text-center"><a href="{{ route('edit',$list->id) }}"><i class="far fa-edit"></i></a></td>
      <td class="text-center"><a href="{{ route('delete',$list->id) }}"><i class="fas fa-trash-alt"></i></a></td>
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