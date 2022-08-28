<?php

namespace App\Http\Controllers;

use App\Models\daftarmodel;
use App\Models\gurumodel;
use App\Models\kelasmodel;
use App\Models\konfirmasimodel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $konfirmasi = konfirmasimodel::with('kelas','daftar','member')->where('member', auth()->user()->id)->first();

        // if($konfirmasi->image == null){
        //     $title = "Konfirmasi";
        //     $kode_confirm = $konfirmasi->id_konfirmasi;
        //     return view('pages.konfirmasi', compact('konfirmasi','title','kode_confirm'));
        // }

        $data = daftarmodel::get();
        $nomor = 1;
        return view('layouts.admin.daftar', compact('data', 'nomor'));
    }

    public function exportpdf($kode)
    {
        $data = daftarmodel::where('id_daftar', $kode)->first();
        $kelas = kelasmodel::where('id_kelas', $data->id_kelas)->first();

        $pdf = Pdf::loadView('layouts.admin.datadaftarpdf', compact('data' ,'kelas') );
        return $pdf->stream('Form Daftar ' . $data->nama_siswa.'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Daftar';
        $kelas = kelasmodel::get();
        return view('pages.daftar', compact('title', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_kelas' => 'required',
            'nama_siswa' => 'required |max :100',
            'tempat_lahir' => 'required |max :100',
            'tanggal_lahir' => 'required',
            'nama_ayah' => 'required |max :100',
            'nama_ibu' => 'required |max :100',
            'pekerjaan_ayah' => 'required |max :100',
            'pekerjaan_ibu' => 'required |max :100',
            'alamat' => 'required |max :100',
            'telepon_ayah' => 'required |max :100',
            'telepon_ibu' => 'required |max :100',
        ]);
        $validateData['id_users'] = auth()->user()->id;
        $validateData['tanggal_lahir'] = date_format(date_create($request->tanggal_lahir), 'Y-m-d');
        $daftar = daftarmodel::create($validateData);

        $biaya = kelasmodel::where('id_kelas', $request->id_kelas)->value('biaya');
        $konfirmasi = konfirmasimodel::create([
            'id_konfirmasi' => $request->id_konfirmasi,
            'member' => auth()->user()->id,
            'id_daftar' =>$daftar->id_daftar,
            'id_kelas' => $request->id_kelas,
            'biaya' => $biaya,
        ]);
        session(['kode_confirm' => $konfirmasi->id_konfirmasi]);
        return redirect()->route('konfirmasi.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'daftar';
        $daftar = daftarmodel::where('id_daftar', $id)->first();
        $kelas = kelasmodel::get();
        return view('layouts.admin.detaildaftar', compact('title', 'daftar', 'kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'daftar';
        $daftar = daftarmodel::where('id_daftar', $id)->first();
        $kelas = kelasmodel::get();
        return view('layouts.admin.editdaftar', compact('title', 'daftar', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'id_kelas' => 'required',
            'nama_siswa' => 'required |max :100',
            'tempat_lahir' => 'required |max :100',
            'tanggal_lahir' => 'required',
            'nama_ayah' => 'required |max :100',
            'nama_ibu' => 'required |max :100',
            'pekerjaan_ayah' => 'required |max :100',
            'pekerjaan_ibu' => 'required |max :100',
            'alamat' => 'required |max :100',
            'telepon_ayah' => 'required |max :100',
            'telepon_ibu' => 'required |max :100',
        ]);
        $validateData['id_users'] = 1;
        $validateData['tanggal_lahir'] = date_format(date_create($request->tanggal_lahir), 'Y-m-d');
        $daftar = daftarmodel::where('id_daftar', $id)->update($validateData);
        return redirect()->route('daftar.index')->with('success', 'Registration berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = daftarmodel::where('id_daftar', $id)->delete();
        return redirect()->route('daftar.index')->with('success', 'Registration berhasil dihapus!');
    }
}
