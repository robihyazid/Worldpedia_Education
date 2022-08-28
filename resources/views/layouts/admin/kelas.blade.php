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
                <a href="{{ route('kelas.create') }}"class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>

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
                            <th>Kelas</th>
                            <th>Guru</th>
                            <th>Meetings</th>
                            <th>Level</th>
                            <th>Jam Awal</th>
                            <th>Jam Akhir</th>
                            <th>Total</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->guru->name }}</td>
                                <td>{{ $item->meetings }}</td>
                                <td>{{ $item->level }}</td>
                                <td>{{ date_format(date_create($item->jam_awal), 'h:i') }}</td>
                                <td>{{ date_format(date_create($item->jam_akhir), 'h:i') }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->biaya }}</td>
                                <td><a href="{{ route('kelas.edit', $item->id_kelas) }}"class="btn btn-warning"><i
                                            class="fas fa-pen"></i></a>
                                    <button class="btn btn-danger"
                                        onclick="hapus(`{{ route('kelas.destroy', $item->id_kelas) }}`)"><i
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
