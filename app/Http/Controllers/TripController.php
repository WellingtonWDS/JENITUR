<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Trip;

class TripController extends Controller
{

    private $tripModel;

    public function __construct(Trip $trip)
    {
        $this->tripModel = $trip;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "cria viagem";
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

    //Teste de cadastro de viagem
    //OBs alteração nas tabelas add created_at and updated_at

    public function teste()
    {
        
        $trip = $this->tripModel;
        $trip->ORIGEM = 'Jenipapo';
        $trip->DESTINO = 'São Paulo';
        $trip->DATA = '2020-07-01';
        $trip->HORARIO = '00:00:00';
        $trip->STATUS = 1;
        $trip->PLACAVEICULO = 'pwk-781';

        echo $trip->status;
        echo $trip->origem;
        
        $res = $trip->save();

        if($res)
          return 'ok';
        else
          return 'erro';
    }
}
