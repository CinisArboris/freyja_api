<?php

namespace App\Http\Controllers;
use App\Votacion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class VotacionController extends Controller{
    public function index(){
        # ************************
        $data = DB::table('votacion')
        ->select(
            'idcandidato',
            DB::raw('SUM(voto) as votoT')
            )
        ->groupBy('idcandidato')
        #->select('sup')
        #->groupBy('sup')
        ->get();
        return response()->json($data, 200);
    }

    public function create() { }

    public function store(Request $request) {
        if ($request->isMethod('POST')) {
            $valid = sizeof($request->input());
            if ($valid == 0){
                return response()->json('NAN', 200);
            }

            $validacion = $request->validate([
                'idmesa' => 'required',
                'idcandidato' => 'min:1|max:7',
                'voto' => 'required|string|max:5000'
            ]);

            DB::table('votacion')->insert(
                [$validacion]
            );
            return response()->json($validacion, 200);
        }else{
            response()->json('not today', 200);
        }

    }

    public function show($votacion) {
        // Pais
        if ($votacion == 1){
            $data =
                DB::table('geo_pais')
                ->join('geo_departamento', 'geo_departamento.sup', '=', 'geo_pais.id')
                ->join('geo_provincia', 'geo_provincia.sup', '=', 'geo_departamento.id')
                ->join('geo_municipio', 'geo_municipio.sup', '=', 'geo_provincia.id')
                ->join('geo_localidad', 'geo_localidad.sup', '=', 'geo_municipio.id')
                ->join('geo_recinto', 'geo_recinto.sup', '=', 'geo_localidad.id')
                ->join('geo_mesa', 'geo_mesa.sup', '=', 'geo_recinto.id')
                ->join('votacion', 'votacion.idmesa', '=', 'geo_mesa.id')

                ->join('candidatos', 'candidatos.id', '=', 'votacion.idcandidato')

                ->select('geo_pais.nombre', 'candidatos.nombres', DB::raw('SUM(votacion.voto) as votoT'))
                ->groupBy('geo_pais.nombre', 'candidatos.nombres')
                ->get();
            return response()->json($data, 200);
        }
        // Departamento
        if ($votacion == 2){
            $data =
                DB::table('geo_departamento')
                ->join('geo_provincia', 'geo_provincia.sup', '=', 'geo_departamento.id')
                ->join('geo_municipio', 'geo_municipio.sup', '=', 'geo_provincia.id')
                ->join('geo_localidad', 'geo_localidad.sup', '=', 'geo_municipio.id')
                ->join('geo_recinto', 'geo_recinto.sup', '=', 'geo_localidad.id')
                ->join('geo_mesa', 'geo_mesa.sup', '=', 'geo_recinto.id')
                ->join('votacion', 'votacion.idmesa', '=', 'geo_mesa.id')

                ->join('candidatos', 'candidatos.id', '=', 'votacion.idcandidato')

                ->select('geo_departamento.nombre', 'candidatos.nombres', DB::raw('SUM(votacion.voto) as votoT'))
                ->groupBy('geo_departamento.nombre', 'candidatos.nombres')
                ->get();
            return response()->json($data, 200);
        }
        // Provincia
        if ($votacion == 3){
            $data =
                DB::table('geo_provincia')
                ->join('geo_municipio', 'geo_municipio.sup', '=', 'geo_provincia.id')
                ->join('geo_localidad', 'geo_localidad.sup', '=', 'geo_municipio.id')
                ->join('geo_recinto', 'geo_recinto.sup', '=', 'geo_localidad.id')
                ->join('geo_mesa', 'geo_mesa.sup', '=', 'geo_recinto.id')
                ->join('votacion', 'votacion.idmesa', '=', 'geo_mesa.id')

                ->join('candidatos', 'candidatos.id', '=', 'votacion.idcandidato')

                ->select('geo_provincia.nombre', 'candidatos.nombres', DB::raw('SUM(votacion.voto) as votoT'))
                ->groupBy('geo_provincia.nombre', 'candidatos.nombres')
                ->get();
            return response()->json($data, 200);
        }
        // Municipio
        if ($votacion == 4){
            $data =
                DB::table('geo_municipio')
                ->join('geo_localidad', 'geo_localidad.sup', '=', 'geo_municipio.id')
                ->join('geo_recinto', 'geo_recinto.sup', '=', 'geo_localidad.id')
                ->join('geo_mesa', 'geo_mesa.sup', '=', 'geo_recinto.id')
                ->join('votacion', 'votacion.idmesa', '=', 'geo_mesa.id')

                ->join('candidatos', 'candidatos.id', '=', 'votacion.idcandidato')

                ->select('geo_municipio.nombre', 'candidatos.nombres', DB::raw('SUM(votacion.voto) as votoT'))
                ->groupBy('geo_municipio.nombre', 'candidatos.nombres')
                ->get();
            return response()->json($data, 200);
        }
        // Localidad
        if ($votacion == 5){
            $data =
                DB::table('geo_localidad')
                ->join('geo_recinto', 'geo_recinto.sup', '=', 'geo_localidad.id')
                ->join('geo_mesa', 'geo_mesa.sup', '=', 'geo_recinto.id')
                ->join('votacion', 'votacion.idmesa', '=', 'geo_mesa.id')

                ->join('candidatos', 'candidatos.id', '=', 'votacion.idcandidato')

                ->select('geo_localidad.nombre', 'candidatos.nombres', DB::raw('SUM(votacion.voto) as votoT'))
                ->groupBy('geo_localidad.nombre', 'candidatos.nombres')
                ->get();
            return response()->json($data, 200);
        }
        // Recinto
        if ($votacion == 6){
            $data =
                DB::table('geo_recinto')
                ->join('geo_mesa', 'geo_mesa.sup', '=', 'geo_recinto.id')
                ->join('votacion', 'votacion.idmesa', '=', 'geo_mesa.id')

                ->join('candidatos', 'candidatos.id', '=', 'votacion.idcandidato')

                ->select('geo_recinto.nombre', 'candidatos.nombres', DB::raw('SUM(votacion.voto) as votoT'))
                ->groupBy('geo_recinto.nombre', 'candidatos.nombres')
                ->get();
            return response()->json($data, 200);
        }
        return 'Elije un parametro válido.';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Votacion  $votacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Votacion $votacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Votacion  $votacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votacion $votacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Votacion  $votacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votacion $votacion)
    {
        //
    }
}
