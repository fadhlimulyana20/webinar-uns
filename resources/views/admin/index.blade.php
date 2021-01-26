@extends('admin.layout')

@section('content')
    <div class="container py-5">
        <h2>Selamat datang di Admin Webinar</h2>
        <div class="row row-cols-md-2 mb-4">
            <div class="col-md-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fas fa-video"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Webinar</span>
                      <span class="info-box-number">{{count($webinars)}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fas fa-file-powerpoint"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Pemaparan Materi</span>
                      <span class="info-box-number">{{$speaker_count}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-primary"><i class="fas fa-users"></i></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Peserta</span>
                      <span class="info-box-number">0</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-certificate"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Jumlah Sertifikat terunduh</span>
                      <span class="info-box-number">0</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary">
                        Agenda Webinar Terdekat
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($closest_webinars as $cw)
                                <a href="/admin/webinar/{{ $cw->id }}/edit" class="list-group-item list-group-item-action">
                                    <h5>{{$cw->agenda}}</h5>
                                    <h6>{{$cw->tanggal_pelaksanaan}}</h6>
                                </a>
                            @endforeach
                          </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection