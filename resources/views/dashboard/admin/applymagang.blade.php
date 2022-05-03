@extends('partials.main')
@section('css')
<!-- Data Tables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
@endsection

@section('container')
@if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif
    <table border="0" cellspacing="5" cellpadding="5" style="margin-bottom: 20px;">
        <tbody class="d-flex justify-content-center">
            <tr>
                <td>Minimum date:</td>
                <td><input type="text" id="min" name="min" class="form-control"></td>
            </tr>
            <tr>
                <td>Maximum date:</td>
                <td><input type="text" id="max" name="max" class="form-control"></td>
            </tr>
        </tbody>
    </table>

    <table id="example" class="display" style="width:100%">
        <thead>
            <th> No. </th>
            <th> Nama Mahasiswa </th>
            <th> Nama Perusahaan </ht>
            <th> Tanggal Apply </th>
            <th> Status Apply </th>
            <th> Tanggal Respon </th>
            <th> Action </th>
        </thead>
        @foreach ($applymagang as $am)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $am->nama_mahasiswa }}</td>
            <td>{{ $am->nama_perusahaan }}</td>
            <td>{{ $am->tanggal_apply }}</td>
            <td>{{ $am->status_apply }}</td>
            <td>{{ $am->tanggal_respon }}</td>
            <td>
            <form action="/admin/applymagang/{{ $am->id_apply_magang }}" method="post" class="btn3 btn-md d-md-inline">
                @method('delete')
                @csrf
                <button class='btn btn-danger' onclick="return confirm('Are you sure?')" type="submit">delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

    <script>
        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[4] );

                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            // DataTables initialisation
            var table = $('#example').DataTable();

            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });
        });
        </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    @endsection
