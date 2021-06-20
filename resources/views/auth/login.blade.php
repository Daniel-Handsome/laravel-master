@extends('layout.tep')



@section('content')
  <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
    @csrf


    <div class="form-group">
      <label for="">email</label>
      <input type="text" name="email" type="email"  value="{{ old('name') }}" required class="form-control{{ $errors->has('email') ? '   is-invalid' : '' }}">

      @if ($errors->has('email'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="">密碼</label>
      <input type="password" name="password"  required
        class="form-control{{ $errors->has('password') ? '   is-invalid' : '' }}">

      @if ($errors->has('password'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>

    {{--  把東西放在token  rember  --}}
    <div class="form-group">
        <div class="form-check">
            <input type="checkbox" name="remember" id=""
            class="form-check-input" value="{{ old('remember')? 'checked': '' }}">

            <label for="remember" class="form-check-label">
                Remember ME
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-block">登入</button>
  </form>
@endsection
