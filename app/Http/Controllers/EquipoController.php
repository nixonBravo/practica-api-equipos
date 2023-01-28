<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{

    public function index()
    {
        $equipos = Equipo::all();
        return response()->json([
            "equipos"=>$equipos
        ]);
    }
    public function store(Request $request)
    {
        Equipo::create($request->all());
        return response()->json([
            "smg"=>"Se creo Correctamente"
        ]);
    }
    public function show( $id)
    {
        $equipo = Equipo::find($id);
        return response()->json([
            "equipo"=>$equipo
        ]);
    }
    public function update(Request $request, $id)
    {
        Equipo::find($id)->update($request->all());
        return response()->json([
            "smg"=>"Se actualizo Correctamente"
        ]);
    }
    public function destroy($id)
    {
         Equipo::find($id)->delete();
        return response()->json([
            "smg"=>"Se elimino Correctamente"
        ]);
    }
}
