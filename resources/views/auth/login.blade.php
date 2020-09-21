@extends('layouts.app')

@section('content')
<section class="content-section">
  <div class="d-flex justify-content-center">
    <div class="col-md-6">
      <form method="POST" class="shadow px-3 py-4 rounded bg-white" action="{{ route('login') }}">
        @csrf
        <h3 class="mb-4 text-dark font-weight-bold">Login Ke Akun Anda</h3>
        <div class="form-group">
          <input id="email" type="email" placeholder="Masukkan Alamat Email Anda" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">
          <input id="password" type="password" placeholder="Masukkan Password Anda"class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-dark" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success font-weight-bold">
                {{ __('Login') }}
                <ion-icon class="align-middle ml-2" name="send"></ion-icon>
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>

      </form>
    </div>
  </div>
</section>
@endsection
