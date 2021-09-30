<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    
 /**
     * Muestra una lista de marcas
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        $datosMarca = Marca::all();
        $contadorMarca = $datosMarca->count();

        return view('marca.indexAdmin', [
                'datosMarca' => $datosMarca,
                'contadorMarca' => $contadorMarca,
            ]);
    }
    /**
     * muestra el formulario de creación de un nuevo vehiculo
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datoMarca = Marca::all();

      return view('marca.create',[
          'datoMarca'=>$datoMarca]);
    }

    /**
     * Guarda los datos de la nueva marca en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $marca = new Marca();
        
        $request->validate([
            'nombre' => 'required'
        ]);

       
        $created_at = Carbon::now()->toDateTimeString(); 
        $input = $request->all();
      
        Marca::create($input);

        return redirect()->route('marca.adminMarca')
        ->with('Success', 'Marca Creada');
    }

    /**
     * Muestra un vehiculo en especifico (por su id)
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
       return view('marca.show',[
       'datosMarca' => $marca
       ]);
    }

    /**
     * Muestra el formulario para editar una marca en especifico(por su id).
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        $datoMarca = Marca::select('*')
        ->findOrFail($marca->idmarca);
        return view('marca.edit', compact('datoMarca'));
    }

    /**
     *Actualiza los datos de la marca especificado en la base de datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    { 
        $request->validate([
        'nombre' => 'required', 
    ]);

    $input = $request->all();
    $marca->update($input);
    return redirect()->route('marca.adminMarca')->with('success', 'El vehiculo ha sido actualizado');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        try { 
            $marca->delete();

            return redirect()->route('marca.adminMarca')->with('borrado', 'Marca Borrada');

          } catch(\Illuminate\Database\QueryException $ex){ 
         
            return redirect()->route('marca.adminMarca')->with('Error', 'No se puede borrar, existe vehiculo asociado con esta entrada');
          }
    }
}
