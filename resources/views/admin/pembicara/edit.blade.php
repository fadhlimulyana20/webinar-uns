@extends('admin.layout')

@section('content')
    <div class="container py-5">
        <form action="{{ route('admin.pembicara.update', $pembicara->id) }}" method="POST" class="shadow p-3 p-md-5 bg-white" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2 class="font-weight-bold mb-4"> Ubah Pembicara </h2>
            <div class="form-group">
                <label for="nama">Nama Pembicara</label>
                <input class="form-control" type="text" name="nama_pembicara" id="nama_pembicara" value="{{ $pembicara->nama_pembicara }}">
            </div>
            <div class="form-group">
                <label for="nama">Topik</label>
                <input class="form-control" type="text" name="topik" id="topik" value="{{ $pembicara->topik }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="webinar">
                    @foreach ($webinar as $w => $val)
                        @if ($w == $pembicara->webinar_id)
                            <option value="{{ $w }}" selected>{{ $val }}</option>
                        @else
                            <option value="{{ $w }}">{{ $val }}</option>
                        @endif
                    @endforeach
                </select>
              </div>
            <div class="form-group">
                <label for="tanggal_awal">Tanggal Presentasi</label>
                <input class="form-control" type="date" name="tanggal_presentasi" id="tanggal_presentasi" value="{{ $pembicara->tanggal_presentasi }}">
            </div>
            <div class="form-group">
                <label for="tanggal_awal">Jam</label>
                <input class="form-control" type="time" name="jam" id="jam" value="{{ $pembicara->jam }}">
            </div>
            @if ($pembicara->file_materi)
                <div class="mb-2">
                    <label>File Materi</label>
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="{{ $pembicara->file_materi }}">
                                <span class="h1"><i class="fas fa-file-prescription"></i></span>
                                <span>{{ $pembicara->nama_file_materi }}</span>
                            </a>
                        </div>
                        <div class="">
                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" data-target="#ubahFileForm" aria-expanded="false" aria-controls="ubahFileForm">Ubah</button>
                        </div>
                    </div>
                    <div class="collapse mt-3" id="ubahFileForm">
                        <div class="form-group">
                            <Label for="file_materi">Upload File Materi</Label>
                            <input class="form-control" type="file" name="file_materi" id="file_materi">
                        </div> 
                    </div>
                </div>
            @else
                <div class="form-group">
                    <Label for="file_materi">Ubah File Materi</Label>
                    <input class="form-control" type="file" name="file_materi" id="file_materi">
                </div>      
            @endif

            <div class="row d-flex justify-content-end mt-4">
                <div class="col-md-4">
                    <input class="btn btn-success btn-block font-weight-bold" type="Simpan" value="Tambah">
                </div>
            </div>
        </form>        
    </div>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
@endsection