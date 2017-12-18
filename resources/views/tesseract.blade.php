

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">OCR</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<h1>Probando OCR</h1>
<span>{{!! $uri !!}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
