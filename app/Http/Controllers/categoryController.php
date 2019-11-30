<?php

namespace App\Http\Controllers;
use App\categoryModel;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kat = categoryModel::all();
        return view('cat.index', ['data' => $kat
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cat.create', [
            'data' => new categoryModel()
          ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'namaKategori' => 'required',
          ));
  
          $kat = new categoryModel();
          $kat->nama = $request->input('namaKategori');
  
          try {
            $kat->save();
          } catch (Exception $e) {
            report($e);
            return false;
          }
  
          return redirect(route('admin_category.index'));
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
        return view('cat.edit', [
            'data' => categoryModel::findOrFail($id)
          ]);
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
        $kat = categoryModel::findOrFail($id);
        $kat->nama = $request->input('namaKategori');

        try {
          $kat->save();
        } catch (Exception $e) {
          report($e);
          return false;
        }

        return redirect(route('admin_category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kat = categoryModel::findOrFail($id);
        $kat->delete();
        return redirect(route('admin_category.index'));
    }
}
