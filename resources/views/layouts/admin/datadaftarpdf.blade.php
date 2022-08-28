<!-- Daftar Start-->
</nav>
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Form Registration</span></p>
            <h1 class="mb-4">Worldpedia Education</h1>
        </div>
        <div class="form-body" style="text-align: left;">

            <label>Class</label><br>
            <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror"
                placeholder="Nama Siswa" value="{{ $kelas->name }}">
            <br>
            <label>Nama Siswa</label><br>
            <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror"
                placeholder="Nama Siswa" value="{{ $data->nama_siswa }}">
            <br>
            <label>Tempat Lahir</label><br>
            <input type="text" name="tempat_lahir" class="form-control @error('nama_siswa') is-invalid @enderror"
                placeholder="Tempat Lahir" value="{{ $data->tempat_lahir }}">
            <br>
            <label>Tanggal Lahir</label><br>
            <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                placeholder="DD/MM/YYYY" value="{{ date_format(date_create($data->tanggal_lahir), 'Y-m-d') }}">
            <br>
            <label>Nama Ayah</label><br>
            <input type="text" name="nama_ayah" class="form-control" @error('nama_ayah') is-invalid @enderror"
                placeholder="Nama Ayah" value="{{ $data->nama_ayah }}">
            <br>
            <label>Nama Ibu</label><br>
            <input type="text" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror""
                placeholder="Nama Ibu" value="{{ $data->nama_ibu }}">
            <br>
            <label>Pekerjaan Ayah</label><br>
            <input type="text" name="pekerjaan_ayah"
                class="form-control @error('pekerjaan_ayah') is-invalid @enderror"" placeholder="Pekerjaan Ayah"
                value="{{ $data->pekerjaan_ayah }}">
            <br>
            <label>Pekerjaan Ibu</label><br>
            <input type="text" name="pekerjaan_ibu"
                class="form-control @error('pekerjaan_ibu') is-invalid @enderror"" placeholder="Pekerjaan Ibu"
                value="{{ $data->pekerjaan_ibu }}">
            <br>
            <label>Alamat</label><br>
            <textarea name="alamat" cols="3" rows="3" class="form-control @error('alamat') is-invalid @enderror""
                placeholder="Alamat lengkap" value="{{ $data->alamat }}">{{ $data->alamat }}</textarea>
            <br>
            <label>No Hp Ayah</label><br>
            <input type="text" name="telepon_ayah" class="form-control @error('telepon_ayah') is-invalid @enderror""
                placeholder="No HP Ayah" value="{{ $data->telepon_ayah }}">
            <br>
            <label>No Hp Ibu</label><br>
            <input type="text" name="telepon_ibu" class="form-control @error('telepon_ibu') is-invalid @enderror""
                placeholder="No HP Ibu" value="{{ $data->telepon_ibu }}">
            <br>
        </div>
    </div>
</div>
</div>
<!-- Daftar End -->
