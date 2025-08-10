@extends('layouts.layout')
@extends('layouts.navbar')
@section('content')
    <div class="container mt-3">
        <div id="alertInfo"></div>
        <h3 class="mb-4">Friend List</h3>
        <table id="userTable" class="table table-light table-striped mt-4 text-center">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <a href="/chat/{{ $user->id }}" class="btn btn-sm btn-primary me-2">
                                <i class="fa-solid fa-comment-dots"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
