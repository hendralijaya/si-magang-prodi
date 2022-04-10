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
            <th> Nama Dosen </th>
            <th> Program Studi </ht>
            <th> Nomor HP </th>
            <th> Action </th>
        </tr>
        @foreach ($dosen as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->nama_dosen }}</td>
            <td>{{ $d->prodi }}</td>
            <td>{{ $d->no_hp }}</td>
            <td>
                <a href="/admin/perusahaan/{{ $d->nik }}" class="btn1 btn btn-success btn-md d-md-inline">show</a>
                <a href="/admin/perusahaan/{{ $d->nik }}/edit" class="btn2 btn btn-warning btn-md d-md-inline">edit</a>
            <form action="/admin/perusahaan/{{ $d->nik }}" method="post" class="btn3 btn-md d-md-inline">
                @method('delete')
                @csrf
                <button class='btn btn-danger' onclick="return confirm('Are you sure?')" type="submit">delete</button>
            </form>
            </td>
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