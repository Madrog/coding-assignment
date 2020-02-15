<?php

namespace App\Http\Controllers;

use App\Individual;
use Illuminate\Http\Request;

class IndividualsController extends Controller
{
    public function index()
    {
        return response(Individual::all()->jsonSerialize(), Response::HTTP_OK);
    } 
}
