<?php

namespace App\Http\Controllers;

use App\Models\gurumodel;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use File;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = gurumodel::get();
        $nomor = 1;
        return view('layouts.admin.teachers', compact('data', 'nomor'));
    }
    public function guru()
    {
        $title = "Teachers";
        $data = gurumodel::get();
        return view('pages.teachers', compact('title', 'data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'guru';
        return view('layouts.admin.tambahteachers', compact('title'));
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
            'image' => 'mimes:jpg,bmp,png',
            'name' => 'required |max :100',
            'bidang' => 'required |max :100',
            'jenis_kelamin' => 'required',
            'alamat' => 'required |max :1000',
        ]);
        $validateData['image'] = $request->file('image')->move('fototeachers/', $request->file('image')->getClientOriginalName());
        $guru = gurumodel::create($validateData);
        $guru->image = $request->file('image')->getClientOriginalName();
        $guru->save();
        //     $guru->save();
        // if($request->hasFile('image')){
        //     $request->file('image')->move('fototeachers/', $request->file('image')->getClientOriginalName());
        //     $guru = gurumodel::where
        //     $guru->image = $request->file('image')->getClientOriginalName();
        //     $guru->save();
        // }
        return redirect()->route('guru.index')->with('success', 'Teachers berhasil ditambahkan!');
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
        $title = 'guru';
        $guru = gurumodel::where('id_guru', $id)->first();
        return view('layouts.admin.editteachers', compact('title', 'guru'));
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
        $file_lama = gurumodel::where('id_guru', $id)->first();
        File::delete(public_path('fototeachers/'), $file_lama->image);
        if ($request->hasFile('image')) {
            $request->file('image')->move('fototeachers/', $request->file('image')->getClientOriginalName());
            $guru = gurumodel::where('id_guru', $id)->update([
                'image' => $request->file('image')->getClientOriginalName(),
                'name' => $request->name,
                'bidang' => $request->bidang,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
            ]);
        }
        return redirect()->route('guru.index')->with('success', 'Teachers berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $file_lama = gurumodel::where('id_guru', $id)->first();
        File::delete(public_path('fototeachers/'), $file_lama->image);
        $guru = gurumodel::where('id_guru', $id)->delete();
        return redirect()->route('guru.index')->with('success', 'Teachers berhasil dihapus!');
    }
}
