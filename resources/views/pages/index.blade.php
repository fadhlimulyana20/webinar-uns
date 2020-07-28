@extends('layouts.app')

@section('content')
<section id="main" class="content-section">
    <div class="container">
        <div class="row d-flex align-items-center text-md-left text-center">
            <div class="col-md-6">
                <img src={{asset('image/Telecommuting-rafiki.svg')}} alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>Selamat Datang di Aplikasi <span class="font-weight-bold">Webinar UNS</span> </h1>
                <p>Aplikasi Webinar UNS adalah aplikasi yang digunakan untuk mendaftarkan diri pada webinar yang diselenggarakan oleh UNS.</p>
                
                <button class="btn btn-lg btn-dark font-weight-bold rounded-pill">Getting Started</button>
            </div>
        </div>
    </div>
</section>

<section class="content-section bg-dark">
    <div class="container">
        <h2 class="text-center text-white">Webinar <span class="font-weight-bold">Terbaru</span></h2>
        <div class="row mt-5">
            <div class="col-md-3 col-6">
                <div class="card mb-4">
                    <img src="https://picsum.photos/536/354" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card mb-4">
                    <img src="https://picsum.photos/536/354" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card mb-4">
                    <img src="https://picsum.photos/536/354" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card mb-4">
                    <img src="https://picsum.photos/536/354" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection