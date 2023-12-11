@extends('layouts.app')

@section('content')

@foreach($conversation->messages as $message)
    <p><strong>{{ $message->user->name }}</strong>: {{ $message->content }}</p>
@endforeach

<form action="{{ route('messages.store', $conversation) }}" method="post">
    @csrf
    <textarea name="content"></textarea>
    <button type="submit">Send</button>
</form>

@endsection