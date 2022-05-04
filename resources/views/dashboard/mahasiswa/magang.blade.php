@extends('partials.main')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('container')
@if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif
    <table id="example" class="display" style="width:100%">
        <thead>
            <th> No. </th>
            <th> Nama Mahasiswa </th>
            <th> Jurusan </th>
            <th> Nama Dosen </th>
            <th> Nama Perusahaan </th>
            <th> Nama Mentor </th>
            <th> Tanggal Pengambilan </th>
            <th> Nilai Angka </th>
            <th> Nilai Huruf </th>
        </thead>
        @foreach ($magang as $m)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->nama_mahasiswa }}</td>
            <td>{{ $m->jurusan }}</td>
            <td>{{ $m->nama_dosen }}</td>
            <td>{{ $m->nama_perusahaan }}</td>
            <td>{{ $m->nama_mentor }}</td>
            <td>{{ $m->tanggal_pengambilan }}</td>
            <td>{{ $m->nilai_magang_angka != NULL ? $m->nilai_magang_angka : '-' }}</td>
            <td>{{ $m->nilai_magang_huruf != NULL ? $m->nilai_magang_huruf : '-' }}</td>
        </tr>
        @endforeach
        </table>
        <script>
            $(document).ready(function() {
            $('#example').DataTable();
        } );
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    @endsection