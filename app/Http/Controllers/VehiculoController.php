<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Marca;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function getMoto()
    {
        $motos = Vehiculo::orderby('idvehiculo','asc')->select('*')->get(); 
     
    
        $response['data'] = $motos;
   
        return response()->json($response);
    }

    /**
     * Muestra una lista de vehiculos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosVehiculo = Vehiculo::select('vehiculo.idvehiculo',
        'vehiculo.motor',
        'vehiculo.modelo',
        'vehiculo.imagen',
        'vehiculo.anio',
        'marca.nombre')
        ->join('marca','marca.idmarca', '=', 'vehiculo.marca_idmarca')
        ->get();

        return view('vehiculo.index', compact('datosVehiculo'));
    }
 /**
     * Muestra una lista de vehiculos
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        $datosVehiculo = Vehiculo::select(
        'vehiculo.idvehiculo',
        'vehiculo.modelo',
        'vehiculo.motor',
        'vehiculo.anio',
        'vehiculo.imagen',
        'vehiculo.created_at',
        'marca.nombre')
        ->join('marca','marca.idmarca', '=', 'vehiculo.marca_idmarca')
        ->get();
        $contadorVehiculo = $datosVehiculo->count();

        return view('vehiculo.indexAdmin', compact('datosVehiculo', 'contadorVehiculo'));
    }
    /**
     * muestra el formulario de creación de un nuevo vehiculo
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datoMarca = Marca::all();
        $datosVehiculo = Vehiculo::all();

      return view('vehiculo.create',compact('datosVehiculo', 'datoMarca'));
    }

    /**
     * Guarda los datos del nuevo vehiculo en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'modelo' => 'required',
           'motor' => 'required',
           'anio' => 'required',
           'marca_idmarca' => 'required',
           'imagen' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
           
       ]);
      
        $input = $request->all();
        if ($image = $request->file('imagen')) {
            $destinoPath = 'image/';
            $imagenVehiculo =date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinoPath, $imagenVehiculo);
            $input['imagen'] = "$imagenVehiculo";
        }
       Vehiculo::create($input);
       return redirect()->route('vehiculo.adminVehiculo')
       ->with('success','Vehiculo creado');
    
    }

    /**
     * Muestra un vehiculo en especifico (por su id)
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        $datosVehiculo = Vehiculo::select('*',
        'marca.nombre')
        ->join('marca','marca.idmarca', '=', 'vehiculo.marca_idmarca')
        ->findOrFail($vehiculo->idvehiculo);

        return view('vehiculo.show', compact('datosVehiculo'));
    }

    /**
     * Muestra el formulario para editar un vehiculo en especifico(por su id).
     * 
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        /*Devuleve un solo modelo por el id pasado si no encuentra arroja error*/
        $datoVehiculo = Vehiculo::select('*',
        'marca.nombre')
        ->join('marca','marca.idmarca', '=', 'vehiculo.marca_idmarca')
        ->findOrFail($vehiculo->idvehiculo);

         $datoMarca = Marca::all();
        return view('vehiculo.edit', compact('datoVehiculo', 'datoMarca'));
    }

    /**
     * Actualiza los datos del vehiculo especificado en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        /*Validación para entrada de datos */
        $request->validate([
            'modelo' => 'required',
            'motor' => 'required',
            'anio' => 'required',
            'imagen' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            
        ]);
 
        $input = $request->all();
        /*IF para preparar la imagen con fecha y extension */
        if ($image = $request->file('imagen')) {
            $destinoPath = 'image/';
            $imagenVehiculo =date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinoPath, $imagenVehiculo);
            $input['imagen'] = "$imagenVehiculo";
        }else {
            unset($input['imagen']);
        }

        $vehiculo->update($input);

        return redirect()->route('vehiculo.adminVehiculo')->with('success', 'El vehiculo ha sido actualizado');
    }

    /**
     * Remueve de la base de datos un vehiculo en especifico(por su ID)
     *
     * @param  \App\Models\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
       $vehiculo->delete();

        return redirect()->route('vehiculo.adminVehiculo')->with('borrado', 'Vehiculo Borrado');
    }
}