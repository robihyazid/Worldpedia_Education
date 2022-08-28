@extends('layouts.admin.sidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="container">
            <form action="{{ route('galeri.update', $galeri->id_galeri) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="">Foto Gallery</label>
                    <br>
                    <input type="file" class="form-control" name="path_foto" value="{{ $galeri->path_foto }}" id=""
                        aria-describedby="emailHelp">
                        <br>
                    @if ($galeri->path_foto)
                        <img src="{{ asset('fotogallery/' . $galeri->path_foto) }}" name='path_foto' alt=""
                            style="width: 100px;">
                    @endif
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
