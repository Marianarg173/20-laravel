<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    <style>
        table {
            border: 2px solid #aaa;
            border-collapse: collapse
        }
        table th, table td {
            font-family: sans-serif;
            font-size: 10px;
            border: 2px solid #ccc;
            padding: 4px;
        }
        table tr:nth-child(odd) {
            background-color: #eee;
        }
        table th {
            background-color: #666;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Active</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ Carbon\Carbon::parse($user->birthdate)->age }} years old</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    @if ($user->active == 1)
                        Active
                    @else
                        Inactive
                    @endif
                </td>

                <td>
                    @php
                        $extension = substr($user->photo, -4);
                    @endphp
                    @if ($extension != 'webp' && $extension != '.svg')
                        <img src="{{ public_path().'/photos/'.$user->photo }}" width="96px">
                    @else
                        Webp|SVG
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>