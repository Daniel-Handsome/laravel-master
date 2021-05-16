@extends('layout.tep')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    {{-- created_at->diffForHumans() 過去多久了轉給人類看得 --}}
    <p>加入時間 {{ $post->created_at->diffForHumans() }}</p>

    {{-- php現在時間 now --}}
    {{-- diffInMinutes轉成min分鐘 找不到解答 --}}
    @if (now()->diffInMinutes($post->created_at) < 5)
    <div class="alert alert-info">New!!</div>
    @endif

@endsection
