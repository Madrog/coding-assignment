<?php

namespace App\Http\Controllers;

use App\Sacco;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SaccosController extends Controller
{
    public function index()
    {
        return response(Sacco::all()->jsonSerialize(), Response::HTTP_OK);
    }
}
