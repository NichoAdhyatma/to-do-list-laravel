<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'todo' => Todo::latest()->get(),
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'mahasiswa_id' => 'required',
            'todo' => 'required',
            'keterangan' => 'required'
        ]);

        $validatedData['is_active'] = true;
        $validatedData['is_done'] = false;

        Todo::create($validatedData);

        return redirect('/Todo')->with('message', 'To Do added !');
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
        return Todo::where('id', $id)->get();
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

        $rules = $request->validate([
            'mahasiswa_id' => 'required',
            'todo' => 'required',
            'keterangan' => 'required'
        ]);

        if ($request['active'] == "active") {
            $rules['is_active'] = true;
            $rules['is_done'] = false;
        } else {
            $rules['is_done'] = true;
            $rules['is_active'] = false;
        }

        Todo::where('id', $id)->update($rules);
        return redirect('/Todo')->with('message', 'To Do updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect('/Todo')->with('message', 'To Do deleted!');
    }
}
