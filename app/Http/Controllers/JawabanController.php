<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jawaban;
use App\Komentar;
use App\Pertanyaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ask = Pertanyaan::find($id);

        $ans = DB::table('Jawaban')->where('pertanyaan_id', '=', $id)->get();
        // $ans = Pertanyaan::find($id)->Jawaban; //pake eloquent

        $listKomentarPertanyaan = KomentarController::getPertanyaan($id);
        $listKomentarJawaban = KomentarController::getJawaban($id);

        return view('Jawaban.index', compact('ans', 'ask', 'listKomentarPertanyaan', 'listKomentarJawaban'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        return view('jawaban.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $qs = $request->fullUrl();
        // $qs = explode('/', $qs);
        // $leng = count($qs);
        // $qs = $qs[$leng];

        $date_created = date('Y-m-d H:i:s');
        $name = $request->input('pertanyaan_id');

        $new_jawab = Jawaban::create([
            "user_id" => Auth::user()->id,
            "pertanyaan_id" => $request["pertanyaan_id"],
            "isi" => $request["isi"],
            "created_at" => $date_created,

        ]);
        return redirect('/pertanyaan/' . $name);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
