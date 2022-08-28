@extends('layouts.admin.sidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="container">
            <label for="guru">Kelas</label><br>
            <select disabled class="form-control" id="daftar" name="id_kelas">
                <option selected disabled>Select Kelas</option>
                @foreach ($kelas as $item)
                    @if ($daftar->id_kelas == $item->id_kelas)
                        <option selected value="{{ $item->id_kelas }}">{{ $item->name }}</option>
                    @else
                        <option value="{{ $item->id_kelas }}">{{ $item->name }}</option>
                    @endif
                @endforeach
            </select>

            <div class="form-group">
                <label for="">Nama Siswa</label>
                <input disabled type="text" class="form-control" name="nama_siswa" value="{{ $daftar->nama_siswa }}"
                    aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input disabled type="text" class="form-control" name="tempat_lahir" value="{{ $daftar->tempat_lahir }}"
                    aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input disabled type="date" class="form-control" name="tanggal_lahir" id=""
                    value="{{ date_format(date_create($daftar->tanggal_lahir), 'Y-m-d') }}" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="">Nama Ayah</label>
                <input disabled type="text" class="form-control" name="nama_ayah" id=""
                    value="{{ $daftar->nama_ayah }}" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="">Nama Ibu</label>
                <input disabled type="text" class="form-control" name="nama_ibu" id=""
                    value="{{ $daftar->nama_ibu }}" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="">Pekerjaan Ayah</label>
                <input disabled type="text" class="form-control" name="pekerjaan_ayah" id=""
                    value="{{ $daftar->pekerjaan_ayah }}" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="">Pekerjaan Ibu</label>
                <input disabled type="text" class="form-control" name="pekerjaan_ibu" id=""
                    value="{{ $daftar->pekerjaan_ibu }}" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea disabled class="form-control" name="alamat" rows="3">{{ $daftar->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Telepon Ayah</label>
                <input disabled type="number" class="form-control" name="telepon_ayah" id=""
                    value="{{ $daftar->telepon_ayah }}" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="">Telepon Ayah</label>
                <input disabled type="number" class="form-control" name="telepon_ibu" id=""
                    value="{{ $daftar->telepon_ibu }}" aria-describedby="emailHelp">
            </div>
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
