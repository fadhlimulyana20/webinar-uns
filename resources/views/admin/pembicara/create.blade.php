@extends('admin.layout')

@section('content')
    <div class="container py-5">
        <form action="{{ route('admin.pembicara.store') }}" method="POST" class="shadow p-3 p-md-5 bg-white" enctype="multipart/form-data">
            @csrf
            <h2 class="font-weight-bold mb-4"> Tambah Pembicara </h2>
            <div class="form-group">
                <label for="nama">Nama Pembicara</label>
                <input class="form-control" type="text" name="nama_pembicara" id="nama_pembicara">
            </div>
            <div class="form-group">
                <label for="nama">Topik</label>
                <input class="form-control" type="text" name="topik" id="topik">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="webinar">
                    @foreach ($webinar as $w => $val)
                        <option value="{{ $w }}">{{ $val }}</option>
                    @endforeach
                </select>
              </div>
            <div class="form-group">
                <label for="tanggal_awal">Tanggal Presentasi</label>
                <input class="form-control" type="date" name="tanggal_presentasi" id="tanggal_presentasi">
            </div>
            <div class="form-group">
                <label for="tanggal_awal">Jam</label>
                <input class="form-control" type="time" name="jam" id="jam">
            </div>
            <div class="form-group">
                <Label for="file_materi">Upload File Materi</Label>
                <input class="form-control" type="file" name="file_materi" id="file_materi">
            </div>

            <div class="row d-flex justify-content-end mt-4">
                <div class="col-md-4">
                    <input class="btn btn-success btn-block font-weight-bold" type="submit" value="Tambah">
                </div>
            </div>
        </form>        
    </div>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
@endsection