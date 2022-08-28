<?php

namespace App\Http\Controllers;

use App\Models\galerimodel;
use Illuminate\Http\Request;
use File;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = galerimodel::get();
        $nomor = 1;
        return view('layouts.admin.gallery', compact('data', 'nomor'));
    }
    public function galeri()
    {
        $title = "Gallery";
        $data = galerimodel::get();
        return view('pages.gallery', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galeri = galerimodel::get();
        $nomor = 1;
        return view('layouts.admin.tambahgallery', compact('galeri', 'nomor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galeri = galerimodel::create([
            'id_galeri' => $request->id_galeri,
            'path_foto' => $request->path_foto,
        ]);
        if ($request->hasFile('path_foto')) {
            $request->file('path_foto')->move('fotogallery/', $request->file('path_foto')->getClientOriginalName());
            $galeri->path_foto = $request->file('path_foto')->getClientOriginalName();
            $galeri->save();
        }
        return redirect()->route('galeri.index')->with('success', 'Photo berhasil ditambahkan!');
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
        $title = 'galeri';
        $galeri = galerimodel::where('id_galeri', $id)->first();
        return view('layouts.admin.editgallery', compact('title', 'galeri'));
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
        $file_lama = galerimodel::where('id_galeri', $id)->first();
        File::delete(public_path('fotogallery/'), $file_lama->path_foto);
        if ($request->hasFile('path_foto')) {
            $request->file('path_foto')->move('fotogallery/', $request->file('path_foto')->getClientOriginalName());
            $galeri = galerimodel::where('id_galeri', $id)->update([
                'path_foto' => $request->file('path_foto')->getClientOriginalName(),
            ]);
        }
        return redirect()->route('galeri.index')->with('success', 'Photo berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $file_lama = galerimodel::where('id_galeri', $id)->first();
        File::delete(public_path('fotogallery/'), $file_lama->path_foto);
        $galeri = galerimodel::where('id_galeri', $id)->delete();
        return redirect()->route('galeri.index')->with('success', 'Photo berhasil dihapus!');
    }
}
