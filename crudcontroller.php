<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crud;
use App\Http\Requests;
use App\Http\Requests\crud\StoreRequest;
use App\Http\Requests\crud\UpdateRequest;

class crudcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = crud::all();
        return view('index',compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $cruds = new crud();
        $cruds->nama = $request->nama;
        $cruds->phone = $request->phone;
        $cruds->save();

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
        $cruds = crud::findOrFail($id);
        return view('edit',compact('cruds'));
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
        $cruds = crud::findOrFail($id);
        $cruds->nama = $request->nama;
        $cruds->save();
        return redirect()->route('crud.index')->with('alert-succes','Data Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cruds = crud::findOrFail($id);
        $cruds->delete();
        return redirect()->route('crud.index')->with('alert-success','Data berhasil di hapus.');
    }
}
