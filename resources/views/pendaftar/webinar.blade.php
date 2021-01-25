@extends('pendaftar.layout')

@section('content')
    <div class="container py-4">
        <h2>Webinar Saya</h2>
        <div class="card p-3">
            <table class="table table-striped table-bordered" id="webinar">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Agenda</th>
                        <th>Tanggal Pelaksanaan</th>
                        <th>Pembicara</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($webinars as $webinar)
                    <tr>
                        <td>{{ $webinar->id }}</td>
                        <td>{{ $webinar->agenda }}</td>
                        <td>{{ $webinar->tanggal_pelaksanaan }}</td>
                        <td>Fulan</td>
                        <td>
                        <button class="btn btn-sm btn-success">Lihat</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
    $(document).ready( function () {
        $('#webinar').DataTable();
    } );
    </script>
@endsection
