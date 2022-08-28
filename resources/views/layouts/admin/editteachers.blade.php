@extends('layouts.admin.sidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="container">
            <form action="{{ route('guru.update', $guru->id_guru) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="">Foto Teachers</label>
                    <br>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        value="{{ old('guru', $guru->image) }}" id="" aria-describedby="emailHelp">
                        <br>
                    @if ($guru->image)
                        <img src="{{ asset('fototeachers/' . $guru->image) }}" name='image' alt=""
                            style="width: 100px;">
                    @endif
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Nama Teachers</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('guru', $guru->name) }}" id="" aria-describedby="emailHelp">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Bidang</label>
                    <input type="text" class="form-control @error('bidang') is-invalid @enderror" name="bidang"
                        value="{{ old('bidang', $guru->bidang) }}" id="" aria-describedby="emailHelp">
                    @error('bidang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                    name="jenis_kelamin">
                    <option selected disabled>Pilih Jenis Kelamin</option>
                    @if ($guru->jenis_kelamin == 'Laki-Laki')
                        <option selected value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    @elseif ($guru->jenis_kelamin == 'Perempuan')
                        <option selected value="Perempuan">Perempuan</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                    @else
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    @endif
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3">{{ old('alamat', $guru->alamat) }}</textarea>
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
