<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Trip;
Use App\Format;
Use App\Validate;

class TripController extends Controller
{

    private $tripModel;
    private $format;
    private $validate;

    public function __construct(Trip $trip, Format $format, Validate $validate)
    {
        $this->tripModel = $trip;
        $this->format = $format;
        $this->validate = $validate;
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
        return "view viagem";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $trip = $this->trip;
        $trip->ORIGEM = $request->origem;
        $trip->DESTINO = $request->destino;
        $trip->DATA = $request->data;
        $trip->HORARIO = $request->horario;
        $trip->STATUS = $request->status;

        $valBoard = $this->validate->validateBoard($request->placa);
        if ($valBoard == 'ok'){
            $trip->PLACAVEICULO = $request->placa;
        }
        

        $trip->save();

    

       return 'viagem criada!';

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

        $format = $this->format;
        $trip = $this->tripModel;
        $res = $trip::where('codviagem', $id)->first();

        if($res) {
            $date = $format->formatDate($res->DATA);
            $hour = $format->formatHour($res->HORARIO);
            $res->DATA = $date;
            $res->HORARIO = $hour;

            return $res;
        }   
        else
          return "viagem não encontrada!";

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

    public function teste($string)
    {
       
        $validate = new Validate();

        $valBoard = $this->validate->validateBoard($string);

        if ($valBoard){
            return $valBoard;
        }

       
       
       
        
    }

    
}
