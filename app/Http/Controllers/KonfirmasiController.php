<?php

namespace App\Http\Controllers;

use App\Models\daftarmodel;
use App\Models\kelasmodel;
use App\Models\konfirmasimodel;
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    public function index()
    {
        $kode_confirm = session('kode_confirm');
        if(! $kode_confirm){
            abort(404);
        }

        $konfirmasi = konfirmasimodel::with('kelas','daftar','member')->where('id_konfirmasi', $kode_confirm)->first();
        $title = "Konfirmasi";
        $nomor = 1;
        return view('pages.konfirmasi', compact('title','konfirmasi', 'nomor','kode_confirm'));
    }

    public function detail()
    {
        $konfirmasi = konfirmasimodel::get();
        $nomor = 1;
        return view('layouts.admin.konfirmasi', compact('konfirmasi','nomor'));
    }

    public function store(Request $request)
    {
        $konfirmasi = konfirmasimodel::where('id_konfirmasi', $request->id_konfirmasi)->update([
            'rekening' => $request->rekening,
            'image' => $request->file('image')->getClientOriginalName(),
        ]);
        if ($request->hasFile('image')) {
            $request->file('image')->move('fotokonfirmasi/', $request->file('image')->getClientOriginalName());
        }
        return redirect ('/afterkonfirmasi');
    }

    // public function index()
    // {
    //     $kode_confirm = session('kode_confirm');
    //     if(! $kode_confirm){
    //         abort(404);
    //     }
    //     $konfirmasi = konfirmasimodel::with('kelas','daftar','member')->where('id_konfirmasi', $kode_confirm)->first();


    //     if($konfirmasi == 'Belum Di Bayar'){
    //        return view belumbayar
    //     }
    //     else if($konfirmasi == 'Sudah Di Bayar'){
    //         return view sudah di bayar
    //     }


    //     $title = "Konfirmasi";
    //     return view('pages.konfirmasi', compact('title','konfirmasi'));
    // }

    public function edit($id){
        $title = 'konfirmasi';
        $konfirmasi = konfirmasimodel::where('id_konfirmasi', $id)->first();
        return view('layouts.admin.editkonfirmasi', compact('title', 'konfirmasi'));
    }

    public function update($id)
    {
        $konfirmasi = konfirmasimodel::where('id_konfirmasi', $id)->update([
            'admin' => auth()->user()->id,
            'konfirmasi' => 'Sudah Di Bayar',
        ]);
        return redirect()->route('konfirmasi.detail')->with('success', 'Konfirmasi berhasil diedit!');
    }

    public function destroy($id){
        $hapus = konfirmasimodel::where('id_konfirmasi', $id)->delete();
        return redirect()->route('konfirmasi.detail')->with('success', 'Konfirmasi berhasil dihapus!');
    }

}
