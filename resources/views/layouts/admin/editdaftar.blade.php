@extends('layouts.admin.sidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="container">
            <form action="{{ route('daftar.update', $daftar->id_daftar) }}" method="post">
                @method('put')
                @csrf
                <label for="guru">Kelas</label><br>
                <select class="form-control @error('id_kelas') is-invalid @enderror" id="daftar" name="id_kelas">
                    <option selected disabled>Select Kelas</option>
                    @foreach ($kelas as $item)
                        @if ($daftar->id_kelas == $item->id_kelas)
                            <option selected value="{{ $item->id_kelas }}">{{ $item->name }}</option>
                        @else
                            <option value="{{ old('kelas', $item->id_kelas) }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('id_kelas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    <label for="">Nama Siswa</label>
                    <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa"
                        value="{{ old('nama_siswa', $daftar->nama_siswa) }}" aria-describedby="emailHelp">
                    @error('nama_siswa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                        name="tempat_lahir" value="{{ old('tempat_lahir', $daftar->tempat_lahir) }}"
                        aria-describedby="emailHelp">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        name="tanggal_lahir" id=""
                        value="{{ old('tanggal_lahir', date_format(date_create($daftar->tanggal_lahir), 'Y-m-d')) }}"
                        aria-describedby="emailHelp">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Nama Ayah</label>
                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah"
                        id="" value="{{ old('nama_ayah', $daftar->nama_ayah) }}" aria-describedby="emailHelp">
                    @error('nama_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Nama Ibu</label>
                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu"
                        id="" value="{{ old('nama_ibu', $daftar->nama_ibu) }}" aria-describedby="emailHelp">
                    @error('nama_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Pekerjaan Ayah</label>
                    <input type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                        name="pekerjaan_ayah" id="" value="{{ old('pekerjaan_ayah', $daftar->pekerjaan_ayah) }}"
                        aria-describedby="emailHelp">
                    @error('pekerjaan_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Pekerjaan Ibu</label>
                    <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                        name="pekerjaan_ibu" id="" value="{{ old('pekerjaan_ibu', $daftar->pekerjaan_ibu) }}"
                        aria-describedby="emailHelp">
                    @error('pekerjaan_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3">{{ old('alamat', $daftar->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Telepon Ayah</label>
                    <input type="number" class="form-control @error('telepon_ayah') is-invalid @enderror"
                        name="telepon_ayah" id="" value="{{ old('telepon_ayah', $daftar->telepon_ayah) }}"
                        aria-describedby="emailHelp">
                    @error('telepon_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Telepon Ibu</label>
                    <input type="number" class="form-control @error('telepon_ibu') is-invalid @enderror"
                        name="telepon_ibu" id="" value="{{ old('telepon_ibu', $daftar->telepon_ibu) }}"
                        aria-describedby="emailHelp">
                    @error('telepon_ibu')
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
