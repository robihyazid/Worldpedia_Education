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
                            <th>Nama Siswa</th>
                            <th>image</th>
                            <th>Biaya</th>
                            <th>Rekening</th>
                            <th>konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konfirmasi as $item)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $item->daftar->nama_siswa }}</td>
                                <td><img src="{{ asset('fotokonfirmasi/' . $item->image) }}" alt=""
                                        style="width: 150px;"></td>
                                <td>{{ $item->kelas->biaya }}</td>
                                <td>{{ $item->rekening }}</td>
                                <td>{{ $item->konfirmasi }}</td>
                                <td><a href="{{ route('konfirmasi.edit', $item->id_konfirmasi) }}" class="btn btn-warning"><i
                                            class="fas fa-pen"></i></a>
                                    <button class="btn btn-danger"
                                        onclick="hapus(`{{ route('konfirmasi.destroy', $item->id_konfirmasi) }}`)"><i
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
