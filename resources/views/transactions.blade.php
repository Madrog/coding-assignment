@extends('layout')


@section('content')
    <div class="title m-b-md">Transactions</div>
    <div id="app">
        <div class="row">
            <div class="col-md-8">
                <simple-upload></simple-upload>
            </div>
            <div class="col-md-4">
                <summary-component></summary-component>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <index-component></index-component>
            </div>
        </div>
    </div>
@endsection