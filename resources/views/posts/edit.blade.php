@extends('layout.tep')

@section('title', 'update')

@section('content')

    <form action="{{ route('posts.update',['post'=>$post->id]) }}" method="POST">
        @csrf
        @method('PUT')

        @include('posts.include.form')
        <div><input type="submit" value="update"></div>
    </form>
@endsection
