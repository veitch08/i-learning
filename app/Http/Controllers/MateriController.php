<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role->slug === "guru") {
            $materi = Materi::where('id_user', auth()->user()->guru->id)->get();
            return view('materi.index', ["title" => "materi"], compact('materi'));
        }elseif (auth()->user()->role->slug === "siswa") {
            $materi = Materi::where('id_user', auth()->user()->siswa->kelas->id)->get();
            return view('materi_kelas.index', ["title" => "materi-kelas"], compact('materi'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('materi.create', ["title" => "materi"], compact('guru'));
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
            'cover' => 'required|image|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $materi = new Materi();
        $materi->id_user = auth()->user()->guru->id;
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('img/cover/', $name);
            $materi->cover = $name;
        }
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->save();

        return redirect()->route('materi.index')->with('toast_success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materi = Materi::findOrFail($id);
        if (auth()->user()->role->slug === "guru") {
            return view('materi.show', ["title" => "materi"], compact('materi'));
        }elseif (auth()->user()->role->slug === "siswa") {
            return view('materi_kelas.show', ["title" => "materi-kelas"], compact('materi'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        return view('materi.edit', ["title" => "materi"], compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $validated = $request->validate([
            'cover' => 'image|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $materi->id_user = auth()->user()->guru->id;
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('img/cover/', $name);
            $materi->cover = $name;
        }
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->save();

        return redirect()->route('materi.index')->with('toast_success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        $materi->delete();
        $materi->cover = $materi->deleteImage();
        return redirect()->route('materi.index')->with('toast_success', 'Data berhasil dihapus');
    }
}
