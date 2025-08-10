@extends('layouts.layout')
@extends('layouts.navbar')
@section('content')
    <div class="container mt-3">
        <div id="alertInfo"></div>
        <h3 class="mb-4">My Meeting</h3>
        <button id="addMeetingRoomBtn" type="button" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i> Create Meeting
        </button>
        <table id="userTable" class="table table-light table-striped mt-4 text-center">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Rangga Widya</td>
                    <td>
                        <a href="" class="btn btn-sm btn-primary me-2">
                            <i class="fa-solid fa-comment-dots"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
