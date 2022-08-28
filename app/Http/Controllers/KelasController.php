<?php

namespace App\Http\Controllers;

use App\Models\daftarmodel;
use App\Models\gurumodel;
use App\Models\kelasmodel;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kelasmodel::get();
        $nomor = 1;
        return view('layouts.admin.kelas', compact('data', 'nomor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'kelas';
        $guru = gurumodel::get();
        return view('layouts.admin.tambahkelas', compact('title', 'guru'));
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
            'id_guru' => 'required',
            'name' => 'required |max :100',
            'meetings' => 'required |max :100',
            'level' => 'required |max :100',
            'deskripsi' => 'required |max :1000',
            'jam_awal' => 'required',
            'jam_akhir' => 'required',
            'total' => 'required',
            'biaya' => 'required',
        ]);
        $validateData['jam_awal'] = date_format(date_create($request->jam_awal), 'h:i:s');
        $validateData['jam_akhir'] = date_format(date_create($request->jam_akhir), 'h:i:s');
        $kelas = kelasmodel::create($validateData);
        return redirect()->route('kelas.index')->with('success', 'Class berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'kelas';
        $kelas = kelasmodel::where('id_kelas', $id)->first();
        $guru = gurumodel::get();
        return view('layouts.admin.editkelas', compact('title', 'kelas', 'guru'));
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
            'id_guru' => 'required',
            'name' => 'required |max :100',
            'meetings' => 'required |max :100',
            'level' => 'required |max :100',
            'deskripsi' => 'required |max :1000',
            'jam_awal' => 'required',
            'jam_akhir' => 'required',
            'total' => 'required',
            'biaya' => 'required',
        ]);
        $validateData['jam_awal'] = date_format(date_create($request->jam_awal), 'h:i:s');
        $validateData['jam_akhir'] = date_format(date_create($request->jam_akhir), 'h:i:s');
        $kelas = kelasmodel::where('id_kelas', $id)->update($validateData);
        return redirect()->route('kelas.index')->with('success', 'Class berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = kelasmodel::where('id_kelas', $id)->delete();
        return redirect()->route('kelas.index')->with('success', 'Class berhasil dihapus!');
    }
}
