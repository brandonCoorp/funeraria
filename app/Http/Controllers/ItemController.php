<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Sucursal;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //('tieneacceso','rol.index');
         $this->authorize('verificarPrivilegio','VERITM');
         $items =Item::orderBy('id','Asc')->paginate(5);
         return view('item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('verificarPrivilegio','INSITM');
        $sucursals=Sucursal::get();
        return view('item.create', compact('sucursals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //('tieneacceso','rol.create');
         $this->authorize('verificarPrivilegio','INSITM');
        $request->validate([
            'nombre'=>'required|string|max:50',
            'descripcion'=>'required|string|max:255',
            'cod_item'=>'required|min:5|max:50',
            'cantidad'=>'required|numeric',
            'tipo'=>'required|numeric|min:1|max:4',
            'estado'=>'required|numeric|min:1|max:4',
            'costo_unit'=>'required|numeric',
            'sucursal_id'=>'required|numeric|min:1'
            ]);
            $rol =Item::create($request->all());
    
            return redirect()->route('items.index')->with('status_success','Item guardado con Exito');
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
        $this->authorize('verificarPrivilegio','VERITM');
        $item=Item::find($id);
      $sucursals=Sucursal::get();
     
       return view('item.view', compact('item','sucursals'));
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
        $this->authorize('verificarPrivilegio','MODITM');
        $item=Item::find($id);
        $sucursals=Sucursal::get();
       
         return view('item.edit', compact('item','sucursals'));
         
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
        $this->authorize('verificarPrivilegio','MODITM');
        $request->validate([
            'nombre'=>'required|string|max:50',
            'descripcion'=>'required|string|max:255',
            'cod_item'=>'required|max:50',
            'cantidad'=>'required|numeric',
            'tipo'=>'required|numeric|min:1|max:4',
            'estado'=>'required|numeric|min:1|max:4',
            'costo_unit'=>'required|numeric'
            ]);
            $item = Item::find($id);
            if($item){
                $item->update($request->all());
            }

        return redirect()->route('items.index')->with('status_success','Item Modificado con Exito');    
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
          //  $this->authorize('tieneacceso','pago.destroy');
          $this->authorize('verificarPrivilegio','DELITM');
          $item=Item::find($id);
        if($item){
            $item->delete();
        }
          
          
          return redirect()->route('items.index')->with('status_success','Item Eliminado con Exito');
    }

   
}
