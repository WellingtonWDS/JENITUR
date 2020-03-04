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
        
       $name = $request->input('name', 'Sally');
    

       return $name;

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

       
        $trip = $this->tripModel;
        $res = $trip::where('codviagem', $id)->first();

        if(!$res)
          return "viagem não encontrada!";
        else
          return $res;

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

    public function teste($id)
    {
        $res = var_dump($id);
        return $res;
       
        
    }
}
