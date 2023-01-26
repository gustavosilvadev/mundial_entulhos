<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function showClient($idClient): array
    {

        return [
                'id'=> $idClient,
                'nome'=> 'Showing Client',
               ];
    }

    public function SaveClient($data): bool{
        if(isset($data))
            return true;
        else
            return false;
    }
}
