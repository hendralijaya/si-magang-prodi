@extends('partials.main')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/table.css'); }}">
@endsection

@section('container')
@if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif
    <table>
        <tr>
            <th> No. </th>
            <th> Nama Mahasiswa </th>
            <th> Nama Perusahaan </ht>
            <th> Tanggal Apply </th>
            <th> Status Apply </th>
            <th> Tanggal Respon </th>
        </tr>
        @foreach ($applymagang as $am)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $am->nama_mahasiswa }}</td>
            <td>{{ $am->nama_perusahaan }}</td>
            <td>{{ $am->tanggal_apply }}</td>
            <td>{{ $am->status_apply }}</td>
            <td>{{ $am->tanggal_respon }}</td>
        </tr>
        @endforeach
        </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    @endsection