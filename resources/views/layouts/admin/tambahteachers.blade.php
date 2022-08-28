@extends('layouts.admin.sidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="container">
            <form action="{{ route('guru.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Foto Teachers</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="" value="{{ old('image') }}" aria-describedby="emailHelp">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Nama Teachers</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="" value="{{ old('name') }}" aria-describedby="emailHelp">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Bidang</label>
                    <input type="text" class="form-control @error('bidang') is-invalid @enderror" name="bidang"
                        id="" value="{{ old('bidang') }}" aria-describedby="emailHelp">
                    @error('bidang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                    value="{{ old('jenis_kelamin') }}" name="jenis_kelamin">
                    <option selected disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                        value="{{ old('alamat') }}" rows="3"></textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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
