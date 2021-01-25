@extends('pendaftar.layout')

@section('content')
    <div class="container py-4">
        <h1>List Webinar Terdekat</h1>
        
        <div class="row">
        @foreach($webinars as $webinar)
            <div class="col-sm-3">
                <div class="card mb-4 shadow">
                    <img src="/storage/file_pamflet/{{ $webinar->path_file_pamflet }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $webinar->agenda }}</h5>
                        <p class="card-text">{!! Str::limit($webinar->deskripsi, 100) !!}</p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <a href="/webinar/{{ $webinar->id }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="font-weight-bold">Link Detail</span>
                                <ion-icon class="align-middle" name="arrow-forward-circle-outline"></ion-icon>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <div class="d-flex justify-content-end">
            <button class="btn btn-lg btn-success">Lihat lebih banyak</button>
        </div>

        @if(isset($myWebinar))
            <h2>Webinar Saya</h2>
            <div class="card p-3">
                <table class="table table-striped table-bordered" id="webinar">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Agenda</th>
                            <th>Tanggal Pelaksanaan</th>
                            <th>Pembicara</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myWebinars as $webinar)
                        <tr>
                            <td>{{ $webinar->id }}</td>
                            <td>{{ $webinar->agenda }}</td>
                            <td>{{ $webinar->tanggal_pelaksanaan }}</td>
                            <td>Fulan</td>
                            <td>
                            <button class="btn btn-sm btn-success">Lihat</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
