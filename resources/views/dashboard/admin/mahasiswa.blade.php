@extends('partials.main')
@section('css')
<link rel="stylesheet" href="{{ URL::asset('css/table.css'); }}">
@endsection

@section('container')
<div class="col-md-3 d-md-inline">
    <a class="btn btn-primary" href="{{ route('mahasiswa.create') }}"> Add New Mahasiswa </a>
</div>
@if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="container">

</div>

    <table>
        <tr>
            <th> No. </th>
            <th> Nama Mahasiswa </th>
            <th> Nomor HP </th>
            <th> Jurusan </th>
            <th> Peminatan </th>
            <th> Tahun Angkatan </th>
            <th> Action </th>
        </tr>
        @forelse ($mahasiswa as $m)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->nama_mahasiswa }}</td>
            <td>{{ $m->no_hp }}</td>
            <td>{{ $m->jurusan }}</td>
            <td>{{ $m->peminatan }}</td>
            <td>{{ $m->tahun_angkatan }}</td>
            <td>
                <a href="/admin/mahasiswa/{{ $m->nim }}" class="btn1 btn btn-success btn-md d-md-inline">show</a>
                <a href="/admin/mahasiswa/{{ $m->nim }}/edit" class="btn2 btn btn-warning btn-md d-md-inline">edit</a>
            <form action="/admin/mahasiswa/{{ $m->nim }}" method="post" class="btn3 btn-md d-md-inline">
                @method('delete')
                @csrf
                <button class='btn btn-danger' onclick="return confirm('Are you sure?')" type="submit">delete</button>
            </form>
            </td>
        </tr>
        @empty
            <h3>Mahasiswa is null</h3>
        @endforelse
        </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    @endsection