{{-- old使用者輸入的舊資料  因為有錯誤 他會redir 所以要把不重要的殘留 --}}
{{-- **************非常重要 這邊的$post 是edit的 但你create沒有傳東西 --}}
{{-- ************** 所以要用optional 中文 可選的  --}}
{{-- **********使用方法 optional  把屬性包起來 不論物件是否為空 很好用 --}}
<div><input type="text" name="title" value="{{ old('title', optional($post ?? null)->title) }}" ></div>
{{-- //特定的錯誤 --}}
@error('title')
    {{-- //用message --}}
    <div>{{ $message }}</div>
@enderror
<div> <textarea name="content" id="" cols="30" rows="10"></textarea></div>
@include('posts.include.form')
<div><input type="submit" value="update"></div>
{{-- any 或 fail () 驗證專用的 --}}
@if ($errors->any())
    <div>
        <ul>
            {{-- 這邊藥用all去把全部 我猜可能是因為都是物件 所以要包起來array然後跑foreach --}}
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
