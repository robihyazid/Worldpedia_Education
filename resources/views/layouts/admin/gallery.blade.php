@extends('layouts.admin.sidebar')
@push('css.vendor')
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <a href="{{ route('galeri.create') }}"class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                <br>
                <br>

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <table id="Daftar" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>
                                    <img src="{{ asset('fotogallery/' . $item->path_foto) }}" alt=""
                                        style="width: 100px;">
                                </td>
                                <td><a href="{{ route('galeri.edit', $item->id_galeri) }}"class="btn btn-warning"><i
                                            class="fas fa-pen"></i></a>
                                    <button class="btn btn-danger"
                                        onclick="hapus(`{{ route('galeri.destroy', $item->id_galeri) }}`)"><i
                                            class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <form action="" method="post" id="formhapus">
            @csrf
            @method('delete')
        </form>

        @push('javascript.vendor')
            <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        @endpush

        @push('javascript.custom')
            <script>
                $('#Daftar').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true,
                });

                function hapus(url) {
                    if (confirm("Sure to delete data") == true) {
                        document.getElementById("formhapus").setAttribute("action", url);
                        document.getElementById("formhapus").submit();
                    } else {
                        return;
                    }
                }
            </script>
        @endpush
    @endsection
