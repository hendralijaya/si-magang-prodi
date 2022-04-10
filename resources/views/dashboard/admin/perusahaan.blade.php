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
<div class="col-md-3 d-md-inline">
    <a class="btn btn-primary"> Add New Perusahaan </a>
</div>

<div class='container'>
    <div class="row">
        <div class="col-md-3">
            <h3 class="btn btn-primary">Filter : </h3>
            <form action="{{ route('perusahaan.index') }}" method="get">
                @csrf
                <div class="form-group">
                    <label for="">Status Kerja Sama : </label>
                    <select name="status_kerja_sama" id="status_kerja_sama" class="form-control">
                        <option value=""></option>
                        <option value="MOU">MOU</option>
                        <option value="MOA">MOA</option>
                    </select>
                    <label for="">ORDER BY : </label>
                    <select name="order_by" id="order_by" class="form-control">
                        <option value="nama_perusahaan">Nama Perusahaan</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>

    <table>
        <tr>
            <th>No. </th>
            <th> Nama Perusahaan </th>
            <th> Status Kerja Sama </ht>
            <th> Nomor Telepon </th>
            <th> Email Perusahaan </th>
            <th> Action </th>
        </tr>
        @forelse ($perusahaan as $company)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $company->nama_perusahaan }}</td>
            <td>{{ $company->status_kerja_sama == '' ? '-' : $company->status_kerja_sama}}</td>
            <td>{{ $company->nomor_telepon }}</td>
            <td>{{ $company->email_perusahaan }}</td>
            <td>
            <a href="/admin/perusahaan/{{ $company->id_perusahaan }}" class="btn1 btn btn-success btn-md d-md-inline">show</a>
            <a href="/admin/perusahaan/{{ $company->id_perusahaan }}/edit" class="btn2 btn btn-warning btn-md d-md-inline">edit</a>
            <form action="/admin/perusahaan/{{ $company->id_perusahaan }}" method="post" class="btn3 btn-md d-md-inline">
                @method('delete')
                @csrf
                <button class='btn btn-danger' onclick="return confirm('Are you sure?')" type="submit">delete</button>
            </form>
            </td>
        </tr>
        @empty
            <h3>Prrusahaan is null</h3>
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