@extends('layouts.app')

@section('title')
    Membuat Webinar       
@endsection

@section('content')
    <section class="content-section">
        <div class="container">
            <form action="{{ route('webinar.store') }}" method="POST" class="shadow p-3 p-md-5">
                @csrf
                <h2 class="font-weight-bold mb-4"> Membuat Webinar </h2>
                <div class="form-group">
                    <label for="agenda">Agenda</label>
                    <input class="form-control" type="text" name="agenda" id="agenda">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10"></textarea>
                </div>
                <div class="alert alert-info mt-4" role="alert">
                    Tentukan Tanggal <span class="font-weight-bold">Pelaksanaan</span> Seminar.
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input class="form-control" type="date" name="tanggal_awal" id="tanggal_awal">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input class="form-control" type="date" name="tanggal_akhir" id="tanggal_akhir">
                        </div>
                    </div>
                </div>
                <div class="alert alert-info mt-4" role="alert">
                    Tentukan Tanggal <span class="font-weight-bold">Pendaftaran</span> Seminar.
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_daftar_awal">Tanggal Daftar Awal</label>
                            <input class="form-control" type="date" name="tgl_daftar_awal" id="tgl_daftar_awal">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tgl_daftar_akhir">Tanggal Daftar Akhir</label>
                            <input class="form-control" type="date" name="tgl_daftar_akhir" id="tgl_daftar_akhir">
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-end mt-4">
                    <div class="col-md-4">
                        <input class="btn btn-success btn-block font-weight-bold" type="submit" value="Buat">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
@endsection