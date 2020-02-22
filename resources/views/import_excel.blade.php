@extends('layout')

@section('content')
    <form style="border: 4px sold #a1a1a1;margin-top:15px;padding: 10px;" action="{{ url('/api/importCSV') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

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
            <p>{{ Session::get('successs') }}</p>
        </div>
    @endif

    <input type="file" name="import_file" />
    <input type="submit" class="btn btn-primary" value="Import File">
    </form>
@endsection
