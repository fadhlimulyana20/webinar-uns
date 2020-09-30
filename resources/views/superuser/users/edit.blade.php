@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user {{$user->nama}}</div>

                <div class="card-body">
                    <form class="" action="{{ route('superuser.users.update', $user) }}" method="post">
                      <div class="form-group">
                        <input id="email" type="email" placeholder="Masukkan Alamat Email Anda" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="form-group">
                          <input id="nama" type="text" placeholder="Nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $user->nama }}" required autocomplete="nama" autofocus>
                          @error('nama')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            @foreach($roles as $role)
                              <div class="form-check">
                                <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                <label>{{$role->name}}</label>
                              </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
