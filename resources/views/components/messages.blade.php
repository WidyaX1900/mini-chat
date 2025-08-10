@foreach ($messages as $message)
    @if ($message->sender_id === Auth::id())
        <div class="d-flex justify-content-end">
            <p class="bg-primary text-light rounded p-2">
                {{ $message->message }}
            </p>
        </div>        
    @else
        <div class="d-flex justify-content-start">
            <p class="bg-secondary text-light rounded p-2">
                {{ $message->message }}
            </p>
        </div>
    @endif
@endforeach
