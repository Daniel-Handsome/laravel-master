@extends('layout.tep')



@section('content')
  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="">name</label>
      {{-- 這邊判斷式加的是bootstap的樣式 錯誤的class表單的格式
        媽的記得class後面 '要加空白 不然class會黏在一起掛掉' --}}
      <input type="text" name="name" value="{{ old('name') }}" required
        class="form-control{{ $errors->has('name') ? '   is-invalid' : '' }}">

      {{-- 上面加對話框的紅色 這邊加錯誤訊息 --}}
      @if ($errors->has('name'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="">email</label>
      <input type="text" name="email" type="email" value="{{ old('name') }}" required
        class="form-control{{ $errors->has('email') ? '   is-invalid' : '' }}">

      @if ($errors->has('email'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="">密碼</label>
      <input type="password" name="password" required
        class="form-control{{ $errors->has('password') ? '   is-invalid' : '' }}">

      @if ($errors->has('password'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="">密碼重複輸入</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    {{-- 驗證碼 --}}
    <div class="form-group">
      <div class="form-check">
        <label class="form-check-label">驗證碼</label>
        <input class="tt-text" name="captcha">
        <img src="{{ captcha_src('inverse') }}" style="cursor: pointer"
          onclick="this.src='{{ captcha_src('inverse') }}'+Math.random()">
        {{-- {!! captcha_img('inverse') !!} --}}
      </div>
      @if ($errors->has('captcha'))
        <div class="col-md-12">
          <p class="text-danger text-left"><strong>{{ $errors->first('captcha') }}</strong></p>
        </div>
      @endif
    </div>

    <button type="submit" class="btn btn-primary btn-block">按鈕</button>
  </form>
@endsection
