@extends('templates.layout')
@section('title', $title)

@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>Khoa</th>
            <th>Old</th>
        </tr>
        <tbody>
            @foreach ($listSv as $sv)
                <tr>
                    <td>{{ $sv->id }}</td>
                    <td>{{ $sv->tensv }}</td>
                    <td>{{ $sv->khoa }}</td>
                    <td>{{ $sv->tuoi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $listSv->links() }}
@endsection
