{{-- old使用者輸入的舊資料  因為有錯誤 他會redir 所以要把不重要的殘留 --}}
{{-- **************非常重要 這邊的$post 是edit的 但你create沒有傳東西 --}}
{{-- ************** 所以要用optional 中文 可選的 --}}
{{-- **********使用方法 optional  把屬性包起來 不論物件是否為空 很好用 --}}
{{-- 但他又會說沒有這個東西所以你要把他在用為null --}}
{{-- 第一步是傳進來 第二步是抓他屬性 所以要用兩次解決 --}}

<div class="form-group">
    <label for="title">title</label>
    <input id="title" type="text" class="form-control" name="title" value="{{ old('title', optional($post ?? null)->title) }}"></div>
{{-- //特定的錯誤 --}}
@error('title')
    {{-- //用message --}}
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
    <label for="content">Content</label>
    <textarea  name="content"  class="form-control" id="content" cols="30" rows="10"></textarea></div>


{{-- any 或 fail () 驗證專用的 --}}
@if ($errors->any())
    <div class="mb-3">
        <ul class="list-group">
            {{-- 這邊藥用all去把全部 我猜可能是因為都是物件 所以要包起來array然後跑foreach --}}
            @foreach ($errors->all() as $error)
            {{-- list-group-item-danger可以跟alert一樣 好用 --}}
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
