<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


class DriverController extends Controller
{
    public function showDriver(): array
    {
        // return new Arrays('Fulano ','Ciclano', 'Beltrano');
        return [
                'id'=> 001,
                'nome'=> 'Showing driver',
               ];
    }

    public function SaveDriver($data){
        return $data;
    }
}
