<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comisione;
use App\Models\Compra;
class ComisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comisions =Comisione::orderBy('id','Asc')->paginate(5);
        return view('comision.index',compact('comisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $comision=Comisione::find($id);
        $compra= $comision->compra;
       
        return view('comision.view', compact('comision','compra'));
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
        $comision=Comisione::find($id);
        $compra= $comision->compra;
       
         return view('comision.edit', compact('compra','comision'));
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
        $request->validate([
            'estado'=>'required|numeric|min:1|max:4',
            ]);
            $comision = Comisione::find($id);
            if($comision){
                $comision->estado = $request->input('estado');
                $comision->save();
            }

        return redirect()->route('comisions.index')->with('status_success','Comision Modificada con Exito');    
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
