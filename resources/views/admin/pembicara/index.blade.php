@extends('admin.layout')

@section('content')
    <div class="container py-5">

        <div class="d-flex justify-content-between mb-4">
            <h2 class="font-weight-bold mb-o my-auto">Daftar Pembicara Webinar</h2>
            <a href="{{ route('admin.pembicara.create') }}" class="btn btn-outline-success font-weight-bold my-auto">Tambah</a>
        </div>
        @if (count($pembicara) > 0) 
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Webinar</th>
                        <th scope="col">Nama Pembicara</th>
                        <th scope="col">Topik</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Aksi</th>
                        {{-- <th scope="col">Tanggal Pelaksanaan</th>
                        <th scope="col">Tanggal Pendaftaran</th>
                        <th scope="col">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembicara as $p)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $p->webinar->agenda }}</td>
                            <td>
                                <a href="/webinar/{{ $p->id }}">
                                    {{ $p->nama_pembicara }}
                                </a>
                            </td>
                            <td>{{ $p->topik }}</td>
                            <td>{{ date('d M Y', strtotime($p->tanggal_presentasi) ) }}</td>
                            <td>{{ date('H:i', strtotime($p->jam)) }}</td>
                            <td>
                                <a type="button" class="btn btn-primary btn-sm" name='edit' href="/admin/pembicara/{{ $p->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.pembicara.destroy', $p->id) }}" method="POST" enctype="multipart/form-data" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" name="hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            {{-- <td>{{ $p->tanggal_pelaksanaan }}</td>
                            <td>{{ $p->tanggal_pendaftaran }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="/admin/webinar/{{ $webinar->id }}/edit">Edit</a>
                                <form action="{{ route('admin.webinar.destroy', $webinar->id) }}" method="POST" enctype="multipart/form-data" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger btn-sm" type="submit" value="Hapus">
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="shadow p-4">
                <h5 class="mb-0">Anda belum menambahkan pembicara.</h5>
            </div>
        @endif
    </div>
@endsection