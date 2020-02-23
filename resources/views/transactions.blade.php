@extends('layout')


@section('content')
    <div class="title m-b-md">Transactions</div>
    @if($errors->any())
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif        

    <div id="app">
        <div class="row">
            <div class="col-md-12">
                <simple-upload></simple-upload>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-8">
                <index-component></index-component>
            </div>
            <div class="col-md-4">
                <summary-component></summary-component>
            </div>
        </div>
    </div>
@endsection