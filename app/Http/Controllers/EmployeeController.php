<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


class EmployeeController extends Controller
{
    public function ShowEmployee($idEmployee): array
    {

        return [
                'id'=> $idEmployee,
                'nome'=> 'Showing Employee',
               ];
    }

    public function SaveEmployee($data): bool{

        if(isset($data))
            return true;
        else
            return false;
    }
}
