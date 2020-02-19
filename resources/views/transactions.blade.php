@extends('layout')


@section('content')
    <div class="title m-b-md">Transactions</div>
    <div id="app">
        <simple-upload></simple-upload>
        <index-component></index-component>
        <summary-component></summary-component>
    </div>
@endsection