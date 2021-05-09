@extends('layout.tep')


@section('content')


    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div><input type="text" name="title"></div>
        {{--  //特定的錯誤  --}}
@error('title')
{{--  //用message  --}}
        <div>{{ $message }}</div>
@enderror
        <div> <textarea name="content" id="" cols="30" rows="10"></textarea></div>


        {{--  any 或 fail () 驗證專用的  --}}
        @if ($errors->any())
        <div>
            <ul>
                {{--  這邊藥用all去把全部 我猜可能是因為都是物件 所以要包起來array然後跑foreach  --}}
                @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div><input type="submit" value="create"></div>
    </form>
@endsection
