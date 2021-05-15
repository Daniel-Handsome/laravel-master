@extends('layout.tep')

@section('title', $post->title)

@section('content')
    {{ $post->content }}
@endsection
