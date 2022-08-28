<?php

namespace App\Http\Controllers;

use App\Models\rolemodel;
use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = user::with('role')->get();
        $nomor = 1;
        return view('layouts.admin.user', compact('data', 'nomor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'users';
        $role = rolemodel::get();
        return view('layouts.admin.tambahuser', compact('title', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validateData = $request->validate([
            'name' => 'required |max :100',
            'id_role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->id_role = $request->id_role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
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
        $title = 'users';
        $user = user::where('id', $id)->first();
        $role = rolemodel::get();
        return view('layouts.admin.edituser', compact('title', 'user', 'role'));
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
            'name' => 'required |max :100',
            'id_role' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = user::find($id);
        $user->id_role = $request->id_role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        //$user->password = bcrypt($request->password);
        $user->save();
        $user = user::where('id', $id)->update($validateData);
        return redirect()->route('user.index')->with('success', 'User berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = user::where('id', $id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}
