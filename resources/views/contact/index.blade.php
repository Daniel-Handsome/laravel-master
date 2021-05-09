@extends('layout.tep')


@section('title', 'blog')

@section('content')


    {{-- $key 就是外面 那層的key 名字 --}}
    {{-- 不存在的話 --}}
    {{-- 下面有簡略版 --}}
    {{-- 改成    forelse  @empty --}}


    {{-- @if (count($contact))
        @foreach ($contact as $key => $con)
            <div>{{ $key }} .{{ $con['title'] }}</div>
        @endforeach
    @else
        no isset
    @endif --}}

    向這個

    @forelse ($contact as $key => $con)


    {{-- 小的 不常用的 或太亂就放另外放 --}}
    {{-- 別擔心變數問題 他會先吃到 可能是向php 會先跑一樣 --}}
    {{-- 擔心的話可以傳第二的參數 是變數 向route一樣 --}}
        @include('contact.par.post')
    @empty
        no isset
    @endforelse






@endsection
