@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section id="main" class="content-section bg-light-blue-main min-vh">
    <div class="container text-white">
        <div class="row d-flex align-items-center text-md-left text-center py-5">

            <div class="col-md-7">
				{{-- <img src={{asset('image/Kids-Studying-from-Home-rafiki.svg')}} alt="" class="img-fluid w-75"> --}}
				<h2 class="mb-0">Selamat Datang di Aplikasi </h2>
                <h1 class="title-big font-weight-bold">Webinar UNS</h1>
                <p class="font-weight-bolder">Aplikasi Webinar UNS adalah aplikasi yang digunakan untuk mendaftarkan diri pada webinar yang diselenggarakan oleh UNS.</p>                
                {{-- <button class="btn btn-lg btn-dark font-weight-bold rounded-pill">Getting Started</button> --}}
            </div>
            <div class="col-md-5">
				<form class="shadow px-3 py-4 rounded bg-white">
					<h3 class="mb-4 text-dark font-weight-bold">Buat Akun Anda</h3>
					<div class="form-group">
						{{-- <label for="name-input">Nama</label> --}}
						<input type="text" class="form-control" name="name-input" id="name-input" placeholder="Nama">
					</div>
					<div class="form-group">
						{{-- <label for="email-input">Email</label> --}}
						<input type="email" class="form-control" name="email-input" id="email-input" placeholder="Email">
					</div>
					<div class="form-group">
						{{-- <label for="password-input">Buat Password</label> --}}
						<input type="password" class="form-control" name="password-input" id="password-input" placeholder="Buat Password">
					</div>
					<div class="form-group">
						{{-- <label for="-confirm-password-input">Konfirmasi Password</label> --}}
						<input type="password" class="form-control" name="-confirm-password-input" id="-confirm-password-input" placeholder="Konfirmasi Password">
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
		{{-- <div class="d-flex justify-content-center mt-4">
			<a href="" class="h1 text-white" id="showMore">
				<ion-icon name="chevron-down-circle-outline"></ion-icon>
			</a>
		</div> --}}
    </div>
</section>

<section class="content-section">
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="col-md-6">
				<img src={{asset('image/Telecommuting-pana.svg')}} alt="" class="img-fluid">
			</div>
			<div class="col-md-6">
				<h1 class="font-weight-bold">Webinar UNS untuk Semuanya</h1>
				<p>
					Selenggarakan webinar atau ikut berpartisiapasi menjadi peserta webinar yang diselenggarakan di UNS. Anda dapat mendaftarkan webinar anda dan mengelola peserta webinar anda dalam satu aplikasi. Anda juga dapat mendaftar pada webinar yang akan diselenggarakan.
				</p>
			</div>
		</div>
	</div>
</section>

<section class="content-section bg-light-blue">
    <div class="container">
        <h1 class="text-center text-white">Webinar <span class="font-weight-bold">Terbaru</span></h1>
        <div class="row mt-5">
            <div class="col-md-3 col-6">
                <div class="card mb-4 shadow">
                    <img src="https://picsum.photos/536/354" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					 <div class="card-footer bg-transparent">
						 <a href="">
							 <div class="d-flex justify-content-between align-items-center">
								 <span class="font-weight-bold">Lihat</span>
								 <ion-icon class="align-middle" name="arrow-forward-circle-outline"></ion-icon>
							 </div>
						 </a>
					 </div>
                  </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card mb-4 shadow">
                    <img src="https://picsum.photos/536/354" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					 <div class="card-footer bg-transparent">
						<a href="">
							 <div class="d-flex justify-content-between align-items-center">
								 <span class="font-weight-bold">Lihat</span>
								 <ion-icon class="align-middle" name="arrow-forward-circle-outline"></ion-icon>
							 </div>
						 </a>
					 </div>
                  </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card mb-4 shadow">
                    <img src="https://picsum.photos/536/354" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					 <div class="card-footer bg-transparent">
						<a href="">
							 <div class="d-flex justify-content-between align-items-center">
								 <span class="font-weight-bold">Lihat</span>
								 <ion-icon class="align-middle" name="arrow-forward-circle-outline"></ion-icon>
							 </div>
						 </a>
					 </div>
                  </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="card mb-4 shadow">
                    <img src="https://picsum.photos/536/354" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					</div>
					 <div class="card-footer bg-transparent">
						<a href="">
							 <div class="d-flex justify-content-between align-items-center">
								 <span class="font-weight-bold">Lihat</span>
								 <ion-icon class="align-middle" name="arrow-forward-circle-outline"></ion-icon>
							 </div>
						 </a>
					 </div>
                  </div>
            </div>
        </div>
    </div>
</section>

{{-- <script>
	$(document).ready(function () {
		$("#showMore").click(function(e){
			e.preventDefault();
			alert('hello');
		})
);
	});
</script> --}}
@endsection