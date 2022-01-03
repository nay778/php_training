@extends('layouts.app')
@section('content')

<div class="table-data">
    <div class="list-title">
        <h2>Student lists</h2>
        <h2>
            <a href="{{ route('create') }}" class="m-r"><i class="far fa-plus-square"></i></a>
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
            <?php $sn = 1; ?>
            @foreach ($lists as $list)
            <tr>
                <td>{{ $sn }}</td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->email }}</td>
                <td>{{ $list->major->name }}</td>
                <td>{{ $list->address }}</td>
                <td class="text-center"><a href="edit-form/{{$list->id }}"><i class="far fa-edit"></i></a></td>
                <td class="text-center"><a href="delete/{{$list->id }}"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php $sn++; ?>
            @endforeach
        @else
            <tr>
                <td colspan="7">No Data Found</td>
            </tr>
        @endif    
    </table>
</div>
@endsection