<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerrenoCreateRequest;
use App\Models\Foto;
use App\Models\Terreno;
use App\Models\Ubicacion;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Return_;

class TerrenoController extends Controller
{
    public function index()
    {
        $terrenos = Terreno::paginate(10);
        return view('terrenos.index', compact('terrenos'));
    }

    public function create()
    {
        return view('terrenos.create');
    }

    public function store(TerrenoCreateRequest $request)
    {
       /*  dd($request); */

        $terreno = new Terreno();
        $terreno->area_terreno = $request->area;
        $terreno->direccion = $request->direccion;
        $terreno->zona = $request->zona;
        $terreno->descripcion = $request->descripcion;
        $terreno->save();

        $ubicacion = new Ubicacion();
        $ubicacion->latitud = $request->latitud;
        $ubicacion->longitud = $request->longitud;
        $ubicacion->terreno_id = $terreno->id;
        $ubicacion->save();

        $foto = new Foto();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = 'img/terrenos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadsucess = $file->move($destinationPath, $filename);
            $foto->imagen = $destinationPath . $filename;
            $foto->terreno_id = $terreno->id;
            $foto->save();
        }
       

        return redirect()->route('terrenos.index');
    }

    public function show($id)
    {
        $terreno = Terreno::find($id);
        return view('terrenos.show', compact('terreno'));
    }

    public function destroy($id)
    {
        $terreno = Terreno::find($id);

        /* foreach ($terreno->fotos as $foto) {
            unlink($foto);
        } */
        Terreno::destroy($id);
        return redirect()->route('terrenos.index');
    }

   
}
