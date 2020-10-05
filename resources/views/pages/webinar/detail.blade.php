@extends('layouts.app')

@section('title')
    @if ($webinar)
        {{$webinar->agenda}}
    @else
        Agenda tidak ditemukan
    @endif
@endsection

@section('content')
    <section class="content-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="font-weight-bold"> {{$webinar->agenda}} </h2>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('webinar.edit', $webinar->id) }}">Edit</a>
            </div>
            <div class="row no-gutters mb-4">
                <div class="col-md-8 px-2">
                    <img src="/storage/file_pamflet/{{ $webinar->path_file_pamflet }}" class="img-fluid rounded shadow w-100" alt="...">
                </div>
                <div class="col-md-4 px-2">
                    <div class="bg-white rounded shadow p-4 mt-md-0 mt-4">
                        <h5 class="font-weight-bold">Pelaksanaan</h5>
                        <p>{{ $webinar->tanggal_pelaksanaan }}</p>
                        <h5 class="font-weight-bold">Pendaftaran</h5>
                        <p>{{ $webinar->tanggal_pendaftaran }}</p>
                        <div class="mt-4">
                            <button class="btn btn-block rounded btn-success font-weight-bold">Daftar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="font-weight-bold">Deskripsi</h5>
            <div class="paragraph-content">
                {!! $webinar->deskripsi !!}
            </div>
        </div>
    </section>
@endsection