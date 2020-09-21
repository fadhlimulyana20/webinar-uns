@extends('layouts.app')

@section('content')
<section class="content-section">
  <div class="d-flex justify-content-center">
    <div class="col-md-6">
      <form method="POST" class="shadow px-3 py-4 rounded bg-white" action="{{ route('register') }}">
        @csrf
        <h3 class="mb-4 text-dark font-weight-bold">Buat Akun Anda</h3>

        <div class="form-group">
            <input id="name" type="text" placeholder="Nama" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password" type="password" placeholder="Buat Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <input id="password-confirm" type="password" placeholder="Konfirmasi Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            <p class="small text-muted mt-3">
              Pastikan setidaknya 15 karakter ATAU setidaknya 8 karakter termasuk angka dan huruf kecil.
            </p>
        </div>

        <button type="submit" class="btn btn-block btn-success font-weight-bold">
          <span class="align-middle">Buat Akun</span>
          <ion-icon class="align-middle ml-2" name="send"></ion-icon>
        </button>
        <div class="mt-4">
          <p class="small text-muted">
            Dengan mengklik "Buat Akun", Anda menyetujui Persyaratan Layanan dan Pernyataan Privasi kami. Kami sesekali akan mengirimi Anda email terkait akun.
          </p>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
