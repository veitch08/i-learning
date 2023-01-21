<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.siswa.index', ["title" => "siswa"], compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.create', ["title" => "siswa"], compact('kelas'));
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
            'nis' => 'required',
            'foto' => 'required|image|max:2048',
            'jenis_kelamin' => 'required'
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_role = 3;
        $user->save();

        $siswa = new Siswa();
        $siswa->id_user = $user->id;
        $siswa->nis = $request->nis;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('img/siswa/', $name);
            $siswa->foto = $name;
        }
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->save();

        return redirect()->route('siswa.index')->with('toast_success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        return view('admin.siswa.show', ["title" => "siswa"], compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        return view('admin.siswa.edit', ["title" => "siswa"], compact('siswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nis' => 'required',
            'foto' => 'image|max:2048',
            'jenis_kelamin' => 'required'
        ]);

        $user = User::find($siswa->id_user);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->id_role = 3;
        $user->save();

        $siswa->id_user = $user->id;
        $siswa->nis = $request->nis;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('img/siswa/', $name);
            $siswa->foto = $name;
        }
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->save();

        return redirect()->route('siswa.index')->with('toast_success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        $siswa->foto = $siswa->deleteImage();
        $user = User::find($siswa->id_user)->delete();
        return redirect()->route('siswa.index')->with('toast_success', 'Data berhasil dihapus');
    }
}
