<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function allEquipos(){
        $equipos = DB::table('equipos')
        ->join('jugadors', 'equipos.id', '=', 'jugadors.equipo_id')
         ->select('jugadors.id as id','jugadors.nJugador as nombre_jugador','jugadors.posicion as posicion_jugador', 'jugadors.numCamisa as numero_camisa', 'equipos.nEquipo as nombre_equipo','equipos.nDT as director_tecnico')
        ->get();
        return response()->json([
            'equipos'=>$equipos,
        ]);
    }
}
