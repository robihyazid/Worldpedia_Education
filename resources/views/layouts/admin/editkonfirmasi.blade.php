@extends('layouts.admin.sidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="container">
            <form action="{{ route('konfirmasi.update', $konfirmasi->id_konfirmasi) }}" method="post">
                @method('put')
                @csrf

                <label for="konfirmasi">Konfirmasi</label><br>
                <select class="form-control" id="konfirmasi"
                    value="{{ old('konfirmasi') }}" name="konfirmasi">
                    <option selected disabled>Select</option>
                    <option value="Sudah Di Bayar">Sudah Di Bayar</option>
                    <option disabled value="Belum Di Bayar">Belum Di Bayar</option>
                </select>
                    {{-- <label for="konfirmasi">Konfirmasi</label><br>
                    <select class="form-control" id="konfirmasi" name="id_konfirmasi">
                        <option selected disabled>Select</option>
                        @foreach ($konfirmasi as $item)
                            <option value="{{ old('konfirmasi') }}"></option>
                        @endforeach
                    </select> --}}
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- Main content -->
        <section class="content">


            @push('javascript.vendor')
            @endpush

            @push('javascript.custom')
                <script>
                    $('#Daftar').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                    });
                </script>
            @endpush
        @endsection
