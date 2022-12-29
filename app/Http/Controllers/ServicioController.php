<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Item;
use App\Models\Itemservicio;
class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servicios =Servicio::orderBy('id','Asc')->paginate(10);
        return view('servicio.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items=Item::get();
            return view('servicio.create', compact('items'));
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
        
       $request->validate([
        'nombre'=>'required|max:50|unique:servicios,nombre',
        'descripcion'=>'required',
        'cod_servicio'=>'required|min:5|max:5|unique:servicios,cod_servicio',
        'costo'=>'required|numeric|min:1',
        ]);
        $servicio =Servicio::create($request->all());

        if($request->input('itemsid') != null){
            $items_id = $request->input('itemsid');
            $cantidades = $request->input('cantidad');
            $i = 0;
            foreach ($items_id as $key => $item_id) {
                $item=Item::find($item_id);
                if($item != null){
                    Itemservicio::create([
                        'item_id' =>$item->id ,
                        'servicio_id' =>$servicio->id ,
                        'cantidad' =>$cantidades[$i],
                        'cod_item' =>$item->cod_item
                      ]);
                }
                $i++;

            }
 
        };

        return redirect()->route('servicios.index')->with('status_success','Servicio guardado con Exito');
       
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
          //  $this->authorize('tieneacceso','rol.edit');
      $servicio=Servicio::findOrFail($id);
      $itemservicios = $servicio->items;
       // dd($itemservicio->id);
      $items=Item::get();
      foreach($itemservicios as $itemservicio){
        $item_id[]= $itemservicio->id;
        
       }
      
     return view('servicio.view', compact('servicio','items','itemservicios','item_id'));
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
         //  $this->authorize('tieneacceso','rol.edit');
      $servicio=Servicio::findOrFail($id);
      $itemservicios = $servicio->items;
       // dd($itemservicio->id);
      $items=Item::get();
      foreach($itemservicios as $itemservicio){
        $item_id[]= $itemservicio->id;
        
       }
      
       return view('servicio.edit', compact('servicio','items','itemservicios','item_id'));
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
        $servicio=Servicio::findOrFail($id);
        $request->validate([
            'nombre'=>'required|max:50|unique:servicios,nombre,'.$servicio->id,
            'descripcion'=>'required',
            'cod_servicio'=>'required|min:5|max:5|unique:servicios,cod_servicio,'.$servicio->id,
            'costo'=>'required|numeric|min:1',
            ]);
           $servicio->update($request->all());
           Itemservicio::where('servicio_id', $servicio->id)->delete();
           $items = $request->get('itemsid');
           $cantidades = $request->input('cantidad');
           if($items){
            $i = 0;
            foreach($items as $item_id){
              $item=Item::findOrFail($item_id);
                if($item){
                    $itemservicio = Itemservicio::create([
                        'item_id' =>$item->id ,
                        'servicio_id' =>$servicio->id ,
                        'cantidad' =>$cantidades[$i],
                        'cod_item' =>$item->cod_item
                      ]);
                }
                $i++;                  
            }
          }
  
    return redirect()->route('servicios.index')->with('status_success','Servicio Modificado con Exito');
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
        //  $this->authorize('tieneacceso','rol.destroy');
      $servicio=Servicio::findOrFail($id);
      if($servicio != null){
        Itemservicio::where('servicio_id', $servicio->id)->delete();
        $servicio->delete();
      }
     
      
      return redirect()->route('servicios.index')->with('status_success','Servicio Eliminado con Exito');
    }
}
