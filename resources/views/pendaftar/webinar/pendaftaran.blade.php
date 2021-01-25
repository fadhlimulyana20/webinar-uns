@extends('pendaftar.layout')

@section('content')
    <div class="container py-4">
        <h1>Pendaftaran Webinar</h1>
        <div class="d-flex">
            <div class="mr-auto"><h2>Daftar Webinar</h2></div>
            <div class="d-flex flex-row-reverse">
                <form class="form-inline">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" id="cariWebinar" placeholder="Cari Webinar">
                    </div>
                    <button type="submit" class="btn btn-success mb-2">Cari</button>
                </form>
            </div>  
        </div>
        
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
    </div>
@endsection