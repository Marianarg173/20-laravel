<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Adoptions</title>
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
                <th>Adoption Date</th>
                <th>Pet Name</th>
                <th>Adopter Name</th>
                <th>Kind</th>
                <th>Breed</th>
                <th>Status</th>
                <th>Pet Photo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adoptions as $adoption)
            <tr>
                <td>{{ $adoption->id }}</td>
                <td>{{ $adoption->adoption_date }}</td>
                <td>{{ $adoption->pet->name }}</td>
                <td>{{ $adoption->user->fullname }}</td>
                <td>{{ $adoption->pet->kind }}</td>
                <td>{{ $adoption->pet->breed }}</td>
                <td>
                    {{-- Assuming 'status' is a string or simple value: pending, approved, rejected --}}
                    @if ($adoption->status == 'approved')
                        Approved
                    @elseif ($adoption->status == 'rejected')
                        Rejected
                    @else
                        Pending
                    @endif
                </td>

                <td>
                    @php
                        // Assuming the pet's image is stored in $adoption->pet->image
                        $pet_image = $adoption->pet->image;
                        $extension = substr($pet_image, -4);
                    @endphp
                    @if ($extension != 'webp' && $extension != '.svg')
                        <img src="{{ public_path().'/photos/'.$pet_image }}" width="96px">
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