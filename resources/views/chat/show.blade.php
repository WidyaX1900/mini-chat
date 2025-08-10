@extends('layouts.layout')
@extends('layouts.navbar')
@section('content')
    <div class="container mt-3">
        <div class="col-7 mx-auto">
            <div class="bg-primary text-light p-2 rounded rounded-bottom-0">
                <h6>{{ $user->name }}</h6>
            </div>
            <div class="border p-3 h-50 d-flex flex-column-reverse overflow-y-auto overflow-x-hidden mb-3">
                <div class="d-flex justify-content-end">
                    <p class="bg-primary text-light rounded p-2">
                        chat 1
                    </p>
                </div>
                <div class="d-flex justify-content-start">
                    <p class="bg-secondary text-light rounded p-2">
                        chat 2
                    </p>
                </div>
            </div>
            <form id="chatForm">
                <div class="mb-3">
                    @csrf
                    <textarea class="form-control mb-1" id="message" rows="2" placeholder="Write message..."></textarea>
                    <div style="font-size: 12px" class="text-danger"></div>
                    <button type="submit" class="btn btn-secondary btn-sm">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
