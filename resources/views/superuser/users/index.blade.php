@extends('layouts.app')

@section('content')
<div class="container content-section">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users
                    <form class="form-inline float-right" action="/superuser/users" method="GET">
                        <input class="form-control-sm" type="search" placeholder="Search" name="cari" value="">
                        <button type="submit" class="btn btn-sm btn-outline-success">Search</button>
                    </form>
                </div>

                <div class="card-body">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Roles</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <th scope="row">{{$user->id_user}}</th>
                          <td>{{$user->nama}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                          <td>
                            <a href="{{route('superuser.users.edit',$user->id_user)}}"><button type="button" class="btn btn-sm btn-warning float-left">Edit</button></a>
                            <form class="float-left" action="{{route('superuser.users.destroy',$user)}}" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                  {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
