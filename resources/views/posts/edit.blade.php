@extends('layout.tep')

@section('title', 'update')

@section('content')

    <form action="{{ route('posts.update',['post'=>$post->id]) }}" method="POST">
        @csrf
        @method('PUT')

        @include('posts.include.form')
        <div><input type="submit" class="btn btn-primary btn-block" value="update"></div>
    </form>
@endsection
