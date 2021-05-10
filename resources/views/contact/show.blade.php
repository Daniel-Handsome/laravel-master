@extends('layout.tep')


@section('title', $contact['title'])

@section('content')

    @if ($contact['new_b'])
        <div> asdadsadsads</div>
    @else
        <h5>11111111</h5>
    @endif


    {{-- 當 flase執行 直接else的意思 --}}
    @unless($contact['new_b'])
        <div class="div"> good</div>
    @endunless


    {{-- isset跟php用法一樣 檢視存不存在 --}}
    @isset($contact['has_true'])
        isset
    @endisset


    {{ $contact['title'] }}
    {{ $contact['content'] }}

@endsection
