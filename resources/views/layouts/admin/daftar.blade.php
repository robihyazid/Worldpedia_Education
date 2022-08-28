@extends('layouts.admin.sidebar')
@push('css.vendor')
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <section class="content">
                    <div class="container">
                        <table id="Daftar" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Nama Siswa</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $nomor++ }}</td>
                                        <td>{{ $item->kelas->name }}</td>
                                        <td>{{ $item->nama_siswa }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td><a href="{{ route('daftar.edit', $item->id_daftar) }}"class="btn btn-warning"><i
                                                    class="fas fa-pen"></i></a>
                                            <button class="btn btn-danger"
                                                onclick="hapus(`{{ route('daftar.destroy', $item->id_daftar) }}`)"><i
                                                    class="fas fa-trash"></i></button>
                                            <a href="{{ route('daftar.show', $item->id_daftar) }}"class="btn btn-info"><i
                                                    class="fas fa-eye"></i></a>
                                                    <a href="{{ route('export.pdf', $item->id_daftar) }}}"class="btn btn-danger"><i
                                                    class="fas fa-file-pdf"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                    "searching": true,
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
