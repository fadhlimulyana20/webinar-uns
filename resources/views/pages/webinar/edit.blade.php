@extends('layouts.app')

@section('title')
    Mengubah Webinar       
@endsection

@section('content')
    <section class="content-section">
        <div class="container">
            <div class="shadow p-3 p-md-5">
                <div class="d-flex justify-content-between mb-4">
                    <h2 class="font-weight-bold"> Mengubah Webinar </h2>
                    <form action="{{ route('webinar.destroy', $webinar->id) }}" class="d-md-inline d-none" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger btn-sm font-weight-bold" type="submit" value="Hapus">
                    </form>
                </div>
                <form action="{{ route('webinar.update', $webinar->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="agenda">Agenda</label>
                        <input class="form-control" type="text" name="agenda" id="agenda" value="{{ $webinar->agenda }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10">{{ $webinar->deskripsi }}</textarea>
                    </div>
                    <div class="alert alert-warning mt-4" role="alert">
                        Ubah Tanggal <span class="font-weight-bold">Pelaksanaan</span> Seminar.
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tanggal_awal">Tanggal Awal</label>
                                <input class="form-control" type="date" name="tanggal_awal" id="tanggal_awal" value="{{ $webinar->tanggal_awal }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input class="form-control" type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ $webinar->tanggal_akhir }}">
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-warning mt-4" role="alert">
                        Ubah Tanggal <span class="font-weight-bold">Pendaftaran</span> Seminar.
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tgl_daftar_awal">Tanggal Daftar Awal</label>
                                <input class="form-control" type="date" name="tgl_daftar_awal" id="tgl_daftar_awal" value="{{ $webinar->tgl_daftar_awal }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tgl_daftar_akhir">Tanggal Daftar Akhir</label>
                                <input class="form-control" type="date" name="tgl_daftar_akhir" id="tgl_daftar_akhir" value="{{ $webinar->tgl_daftar_akhir }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" name="path_file_pamflet" id="path_file_pamflet" class="form-control">
                    </div>
                    <div class="row d-flex justify-content-end mt-4">
                        <div class="col-md-4 mb-2">
                            <input class="btn btn-primary btn-block font-weight-bold" type="submit" value="Simpan">
                        </div>
                    </div>
                </form>
                <form action="{{ route('webinar.destroy', $webinar->id) }}" class="d-md-none">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger btn-block font-weight-bold" type="submit" value="Hapus">
                </form>
            </div>
        </div>
    </section>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
@endsection