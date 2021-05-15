@extends('layout.tep')

@section('title', 'create')

@section('content')

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        @include('posts.include.form')
        <div><input type="submit" value="create"></div>
    </form>
@endsection
