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
    
       $trip = $this->tripModel;
       $trip->ORIGEM = $request->origem;
       $trip->DESTINO = $request->destino;
       $trip->DATA = $request->data;
       $trip->HORARIO =  $request->horario;

       $valBoard = $this->validate->validateBoard($request->placa);
       if ($valBoard == 'ok')
       {
            $trip->PLACAVEICULO = $request->placa;
       }
       else
            return 'placa invalida';
       
      $trip->save();
      return 'viagem criada!';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = 0)
    {
        //

        $format = $this->format;     

        if($id == 0)
        {
            $trip = $this->tripModel::all();
            return $trip;
        }

        else {
            
            $trip = $this->tripModel->find($id);
    
            if($trip) {
                $date = $format->formatDate($trip->DATA);
                $hour = $format->formatHour($trip->HORARIO);
                $trip->DATA = $date;
                $trip->HORARIO = $hour;
    
                return $trip;
            }   
            else
              return "viagem não encontrada!";

        }

       

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
        $trip = $this->tripModel->find($id);

        if($trip)
        {
            $update = $trip->update([
                'ORIGEM' => $request->origem,
                'DESTINO' => $request->destino,
                'DATA' => $request->data,
                'HORARIO' => $request->horario,
            ]);
           
            return 'viagem alterada';
        } 
        else 
            return 'erro';    

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
        $trip = $this->tripModel->find($id);
        
        if($trip)
        {
          $delete = $trip->delete();
          return 'viagem deletada';
        }
        else 
            return 'viagem não encontrada';
    }

    
    public function teste()
    {
        
        $trip = $this->tripModel;
        $trip->ORIGEM = 'Jenipapo, MG';
        $trip->DESTINO = 'Belo Horizonte, SP';
        $trip->DATA = '2020-03-05';
        $trip->HORARIO = '05:00:00';
        $trip->PLACAVEICULO = 'PZU-7682';

        $valBoard = $this->validate->validateBoard($trip->PLACAVEICULO);
        if ($valBoard == 'ok'){
            $trip->PLACAVEICULO = $trip->PLACAVEICULO;
        }
        else
            return 'placa invalida';
        

        $trip->save();

    

       return 'viagem criada!';
    }

    
}
