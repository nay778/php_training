<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>

    <div class="table-data">
        <div class="list-title">
            <h2>Student lists</h2>
            <p>{{ $date }}</p>
        </div>
        <table border="1">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Major</th>
                <th>DOB</th>
                <th>Address</th>
            </tr>
        @foreach($lists as $list)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $list->name }}</td>
                <td>{{ $list->email }}</td>
                <td>{{ $list->major_name }}</td>
                <td>{{ $list->dob }}</td>
                <td>{{ $list->address }}</td>
            </tr>
        @endforeach
        </table>
    </div>
</body>
</html>