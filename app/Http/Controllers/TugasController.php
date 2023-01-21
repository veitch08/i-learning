<?php

namespace App\Http\Controllers;

use App\Models\DetailTugas;
use App\Models\Materi;
use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role->slug === "guru") {
            $tugas = Tugas::where('id_materi', auth()->user()->guru->id)->get();
            return view('tugas.index', ["title" => "tugas"], compact('tugas'));
        }
        elseif (auth()->user()->role->slug === "siswa") {
            $detail_tugas = DetailTugas::select('soal', 'jawaban_a', 'jawaban_b', 'jawaban_c', 'jawaban_d')->get();
            $tugas1 = [];
            foreach($detail_tugas as $tugas) {
                $soals = json_decode($tugas['soal']);
                $jawaban_as = json_decode($tugas['jawaban_a']);
                $jawaban_bs = json_decode($tugas['jawaban_b']);
                $jawaban_cs = json_decode($tugas['jawaban_c']);
                $jawaban_ds = json_decode($tugas['jawaban_d']);

                for($i = 0; $i < count($soals); $i++) {
                    $tugas1[] = [
                        'soal_nomor' => $i + 1,
                        'soal' => $soals[$i],
                        'jawaban' => [
                            $jawaban_as[$i],
                            $jawaban_bs[$i],
                            $jawaban_cs[$i],
                            $jawaban_ds[$i]
                        ]
                    ];
                }
            }
            return view('materi_kelas.tugas', ["title" => "tugas"], compact('tugas1'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materi = Materi::where('id_user', auth()->user()->guru->id)->get();
        return view('tugas.create', ["title" => "tugas"], compact('materi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tugas = new Tugas();
        $tugas->id_materi = $request->id_materi;
        $tugas->nama_tugas = $request->nama_tugas;
        $tugas->save();

        $detail_tugas = new DetailTugas();
        $detail_tugas->id_tugas = $tugas->id;
        $detail_tugas->soal = json_encode($request->soal);
        $detail_tugas->jawaban_a = json_encode($request->jawaban_a);
        $detail_tugas->jawaban_b = json_encode($request->jawaban_b);
        $detail_tugas->jawaban_c = json_encode($request->jawaban_c);
        $detail_tugas->jawaban_d = json_encode($request->jawaban_d);
        $detail_tugas->jawaban_benar = json_encode($request->jawaban_benar);
        $detail_tugas->save();

        return redirect()->route('tugas.index')->with('toast_success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tugas = Tugas::findOrFail($id);
        $materi = Materi::where('id_user', auth()->user()->guru->id)->get();
        $detail_tugas = DetailTugas::all();
        $tugas1 = [];
        foreach($detail_tugas as $tugas2) {
            $soals = json_decode($tugas2['soal']);
            $jawaban_as = json_decode($tugas2['jawaban_a']);
            $jawaban_bs = json_decode($tugas2['jawaban_b']);
            $jawaban_cs = json_decode($tugas2['jawaban_c']);
            $jawaban_ds = json_decode($tugas2['jawaban_d']);

            for($i = 0; $i < count($soals); $i++) {
                $tugas1[] = [
                    'soal_nomor' => $i + 1,
                    'soal' => $soals[$i],
                    'jawaban' => [
                        $jawaban_as[$i],
                        $jawaban_bs[$i],
                        $jawaban_cs[$i],
                        $jawaban_ds[$i]
                    ]
                ];
            }
        }
        // dd($tugas1);
        return view('tugas.show', ["title" => "tugas"], compact('tugas', 'materi', 'tugas1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tugas $tugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tugas  $tugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_tugas = DetailTugas::findOrFail($id);
        $tugas = Tugas::findOrFail($id);
        $detail_tugas->delete();
        $tugas->delete();

        return redirect()->route('tugas.index')->with('toast_success', 'Data berhasil dihapus');
    }
}
