@extends('layouts.layout')
@extends('layouts.navbar')
@section('content')
    <div class="container mt-3">
        <div class="col-7 mx-auto">
            <div class="bg-primary text-light p-2 rounded rounded-bottom-0">
                <h6>{{ $user->name }}</h6>
            </div>
            <div id="chatContent" class="border p-3 h-50 d-flex flex-column-reverse overflow-y-auto overflow-x-hidden mb-3"></div>
            <form id="chatForm">
                <div class="mb-3">
                    @csrf
                    <input type="hidden" id="receiver_id" value="{{ $user->id }}">
                    <textarea class="form-control mb-1" id="message" rows="2" placeholder="Write message..."></textarea>
                    <div style="font-size: 12px" class="text-danger"></div>
                    <button type="submit" class="btn btn-secondary btn-sm">Send</button>
                </div>
            </form>
            <div class="d-none">
                <input type="hidden" id="sender_id" value="{{ Auth::id() }}">
            </div>
        </div>
    </div>
@endsection
