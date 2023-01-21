<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        return view('admin.guru.index', ["title" => "guru"], compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.guru.create', ["title" => "guru"], compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nik' => 'required',
            'foto' => 'required|image|max:2048',
            'jenis_kelamin' => 'required'
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_role = 2;
        $user->save();

        $guru = new Guru();
        $guru->id_user = $user->id;
        $guru->nik = $request->nik;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('img/guru/', $name);
            $guru->foto = $name;
        }
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->id_kelas = $request->id_kelas;
        $guru->save();

        return redirect()->route('guru.index')->with('toast_success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        return view('admin.guru.show', ["title" => "guru"], compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        $kelas = Kelas::all();
        return view('admin.guru.edit', ["title" => "guru"], compact('guru', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nik' => 'required',
            'foto' => 'image|max:2048',
            'jenis_kelamin' => 'required'
        ]);

        $user = User::find($guru->id_user);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_role = 2;
        $user->save();

        $guru->id_user = $user->id;
        $guru->nik = $request->nik;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('img/guru/', $name);
            $guru->foto = $name;
        }
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->id_kelas = $request->id_kelas;
        $guru->save();

        return redirect()->route('guru.index')->with('toast_success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        $guru->foto = $guru->deleteImage();
        $user = User::find($guru->id_user)->delete();
        return redirect()->route('guru.index')->with('toast_success', 'Data berhasil dihapus');
    }
}
