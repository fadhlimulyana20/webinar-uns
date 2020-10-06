@extends('admin.layout')

@section('content')
    <div class="container py-5">

        <div class="d-flex justify-content-between mb-4">
            <h2 class="font-weight-bold mb-o my-auto">Daftar Webinar yang Anda Buat</h2>
            <a href="/admin/webinar/create" class="btn btn-outline-success font-weight-bold my-auto">Tambah</a>
        </div>
        @if (count($webinars) > 0) 
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Agenda</th>
                        <th scope="col">Tanggal Pelaksanaan</th>
                        <th scope="col">Tanggal Pendaftaran</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($webinars as $webinar)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <a href="/webinar/{{ $webinar->id }}">
                                    {{ $webinar->agenda }}
                                </a>
                            </td>
                            <td>{{ $webinar->tanggal_pelaksanaan }}</td>
                            <td>{{ $webinar->tanggal_pendaftaran }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="/admin/webinar/{{ $webinar->id }}/edit">Edit</a>
                                <form action="{{ route('admin.webinar.destroy', $webinar->id) }}" method="POST" enctype="multipart/form-data" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger btn-sm" type="submit" value="Hapus">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="shadow p-4">
                <h5 class="mb-0">Anda belum mengadakan Webinar.</h5>
            </div>
        @endif
    </div>
@endsection