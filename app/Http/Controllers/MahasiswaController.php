<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nrp' => 'required|unique:mahasiswas',
                'nama' => 'required',
                'kelas' => 'required',
                'angkatan' => 'required',
                'no_telp' => 'required',
            ]
        );

        Mahasiswa::create($validatedData);

        return redirect('/Todo')->with('message', 'Success Add Student!');
    }


}
