<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeederVotacion extends Seeder{
    public function run(){
        #https://s3.amazonaws.com/archivo.computo/actas/72000.jpg


        // *****************************************************
        // Chuquisaca
        $tope = 10100;
        $id = 1;
        for ($i=20001; $i <= $tope; $i++) {
            $candidato = 7;
            for ($j=1; $j <= $candidato; $j++) {
                DB::table('votacion')->insert(
                    [
                        //'id' => $id,
                        'idmesa' => $i,
                        'idcandidato' => $j,
                        'voto' => mt_rand(1500, 3000)
                    ]
                );
                $id = $id + 1;
            }
        }
        // *****************************************************
        // La Paz
        $tope = 20100;
        $id = 1;
        for ($i=20001; $i <= $tope; $i++) {
            $candidato = 7;
            for ($j=1; $j <= $candidato; $j++) {
                DB::table('votacion')->insert(
                    [
                        //'id' => $id,
                        'idmesa' => $i,
                        'idcandidato' => $j,
                        'voto' => mt_rand(1500, 3000)
                    ]
                );
                $id = $id + 1;
            }
        }
        // *****************************************************
        // Cochabamba
        $tope = 30100;
        $id = 1;
        for ($i=30001; $i <= $tope; $i++) {
            $candidato = 7;
            for ($j=1; $j <= $candidato; $j++) {
                DB::table('votacion')->insert(
                    [
                        //'id' => $id,
                        'idmesa' => $i,
                        'idcandidato' => $j,
                        'voto' => mt_rand(1500, 3000)
                    ]
                );
                $id = $id + 1;
            }
        }
        // *****************************************************
        // Oruro
        $tope = 40100;
        $id = 1;
        for ($i=40001; $i <= $tope; $i++) {
            $candidato = 7;
            for ($j=1; $j <= $candidato; $j++) {
                DB::table('votacion')->insert(
                    [
                        //'id' => $id,
                        'idmesa' => $i,
                        'idcandidato' => $j,
                        'voto' => mt_rand(1500, 3000)
                    ]
                );
                $id = $id + 1;
            }
        }
        // *****************************************************
        // Potosi
        $tope = 50100;
        $id = 1;
        for ($i=50001; $i <= $tope; $i++) {
            $candidato = 7;
            for ($j=1; $j <= $candidato; $j++) {
                DB::table('votacion')->insert(
                    [
                        //'id' => $id,
                        'idmesa' => $i,
                        'idcandidato' => $j,
                        'voto' => mt_rand(1500, 3000)
                    ]
                );
                $id = $id + 1;
            }
        }
        // *****************************************************
        // Tarija
        $tope = 60100;
        $id = 1;
        for ($i=60001; $i <= $tope; $i++) {
            $candidato = 7;
            for ($j=1; $j <= $candidato; $j++) {
                DB::table('votacion')->insert(
                    [
                        //'id' => $id,
                        'idmesa' => $i,
                        'idcandidato' => $j,
                        'voto' => mt_rand(1500, 3000)
                    ]
                );
                $id = $id + 1;
            }
        }
        // *****************************************************
        // Santa Cruz
        $tope = 70200;
        $id = 1;
        for ($i=70101; $i <= $tope; $i++) {
            $candidato = 7;
            for ($j=1; $j <= $candidato; $j++) {
                DB::table('votacion')->insert(
                    [
                        //'id' => $id,
                        'idmesa' => $i,
                        'idcandidato' => $j,
                        'voto' => mt_rand(1500, 3000)
                    ]
                );
                $id = $id + 1;
            }
        }
        // *****************************************************
        // Beni
        $tope = 80100;
        $id = 1;
        for ($i=80001; $i <= $tope; $i++) {
            $candidato = 7;
            for ($j=1; $j <= $candidato; $j++) {
                DB::table('votacion')->insert(
                    [
                        //'id' => $id,
                        'idmesa' => $i,
                        'idcandidato' => $j,
                        'voto' => mt_rand(1500, 3000)
                    ]
                );
                $id = $id + 1;
            }
        }
        // *****************************************************
        // Pando
        $tope = 90100;
        $id = 1;
        for ($i=90001; $i <= $tope; $i++) {
            $candidato = 7;
            for ($j=1; $j <= $candidato; $j++) {
                DB::table('votacion')->insert(
                    [
                        //'id' => $id,
                        'idmesa' => $i,
                        'idcandidato' => $j,
                        'voto' => mt_rand(1500, 3000)
                    ]
                );
                $id = $id + 1;
            }
        }
    }
}
