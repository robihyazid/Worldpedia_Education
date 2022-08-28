@extends('layouts.admin.sidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="container">
            <form action="{{ route('kelas.store') }}" method="post">
                @csrf
                <label for="guru">Teachers</label><br>
                <select class="form-control @error('id_guru') is-invalid @enderror" id="guru" name="id_guru">
                    <option selected disabled>Select Teachers</option>
                    @foreach ($guru as $item)
                        <option value="{{ old('id_guru', $item->id_guru) }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('id_guru')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <br>

                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="" value="{{ old('nama_siswa') }}" aria-describedby="emailHelp">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Meetings</label>
                    <input type="text" class="form-control @error('meetings') is-invalid @enderror" name="meetings"
                        id="" value="{{ old('meetings') }}" aria-describedby="emailHelp">
                    @error('meetings')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Level</label>
                    <input type="text" class="form-control @error('level') is-invalid @enderror" name="level"
                        id="" value="{{ old('level') }}" aria-describedby="emailHelp">
                    @error('level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi"
                        value={{ old('deskripsi') }} rows="3"></textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Jam Awal</label>
                    <input type="time" class="form-control @error('jam_awal') is-invalid @enderror" name="jam_awal"
                        id="" value="{{ old('jam_awal') }}" aria-describedby="emailHelp">
                    @error('jam_awal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="">Jam Akhir</label>
                    <input type="time" class="form-control @error('jam_akhir') is-invalid @enderror" name="jam_akhir"
                        id="" value="{{ old('jam_akhir') }}" aria-describedby="emailHelp">
                    @error('jam_akhir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="">Total</label>
                    <input type="number" class="form-control @error('total') is-invalid @enderror" name="total"
                        id="" value="{{ old('total') }}" aria-describedby="emailHelp">
                    @error('total')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Biaya</label>
                    <input type="number" class="form-control @error('biaya') is-invalid @enderror" name="biaya"
                        id="" value="{{ old('biaya') }}" aria-describedby="emailHelp">
                    @error('biaya')
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
