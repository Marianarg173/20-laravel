<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Adoptions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #5EC9A5;
            color: white;
        }

        img {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center; margin-bottom:20px;">All Adoptions</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pet Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Pet Photo</th>
                <th>User Photo</th>
                <th>Adopted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptions as $adoption)
            <tr>
                <td>{{ $adoption->id }}</td>
                <td>{{ $adoption->pet->name }}</td>
                <td>{{ $adoption->user->fullname }}</td>
                <td>{{ $adoption->user->email }}</td>
                <td>{{ $adoption->user->phone }}</td>
                <td>
                    <img src="{{ public_path('photos/'.$adoption->pet->image) }}" width="50px">
                </td>
                <td>
                    <img src="{{ public_path('photos/'.$adoption->user->photo) }}" width="50px">
                </td>
                <td>{{ $adoption->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>