@extends('layouts.app')

@section('title','Webinar')

@section('content')
    <section class="content-section">
        <div class="container">
            <h2 class="font-weight-bold mb-4">Daftar Webinar Terbaru</h2>
            <div class="row no-gutters">
                @if (count($webinars) > 0)
                    @foreach ($webinars as $webinar)
                        <div class="col-lg-3 col-md-4 px-md-2 px-1">
                            <div class="card shadow mb-md-2 mb-2">
                                <img src="https://picsum.photos/536/354" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $webinar->agenda }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $webinar->tanggal_awal }}</h6>
                                    <p class="card-text">{{ Str::limit($webinar->deskripsi, 100) }}</p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <a href="/webinar/{{ $webinar->id }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="font-weight-bold">Lihat</span>
                                            <ion-icon class="align-middle" name="arrow-forward-circle-outline"></ion-icon>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            
        </div>
    </section>
@endsection