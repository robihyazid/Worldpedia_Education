@extends('layouts.admin.sidebar')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="container">
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @method('put')
                @csrf

                <div class="form-group">
                    <label for="">Nama Users</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}"
                        id="" aria-describedby="emailHelp">


                    {{-- <label for="role">Role</label><br>
                <select class="form-control @error('id_role') is-invalid @enderror" id="role" name="id_role">
                    <option selected disabled>Select User</option>
                    @foreach ($role as $item)
                        @if ($role->id_role == $item->id_role)
                            <option selected value="{{ $item->id_role}}">{{ $item->nama }}</option>
                        @else
                            <option value="{{ old('id_role', $item->id_role) }}">{{ $item->nama }}</option>
                        @endif
                    @endforeach
                </select>
                @error('id_role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <br> --}}
                    <label for="role">Role</label><br>
                    <select class="form-control @error('id_role') is-invalid @enderror" id="role" name="id_role">
                        <option selected disabled>Select Role</option>
                        @foreach ($role as $item)
                            <option value="{{ old('id_role', $item->id_role) }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <br>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email', $user->email) }}" id="" aria-describedby="emailHelp">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                            value="{{ old('password', $user->password) }}" id="" aria-describedby="emailHelp">
                        @error('password')
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
