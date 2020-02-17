<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TransactionsController extends Controller
{
    public function index()
    {
        return response(Transaction::all()->take(50)->jsonSerialize(), Response::HTTP_OK);
    }
}
