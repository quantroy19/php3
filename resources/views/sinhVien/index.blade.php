<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- Hi {{ $users }} --}}
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>khoa</th>
                <th>tuoi</th>
            </tr>
        </thead>
        <@foreach ($listSv as $sv)
            <tr>
                <td>{{ $sv->id }}</td>
                <td>{{ $sv->tensv }}</td>
                <td>{{ $sv->khoa }}</td>
                <td>{{ $sv->tuoi }}</td>
            </tr>
            @endforeach
    </table>
</body>

</html>
