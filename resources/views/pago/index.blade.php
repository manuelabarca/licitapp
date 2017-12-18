@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pasar a premium</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                  <div class="list-group">
<div class="inner cover">
                <h1 class="cover-heading">Llena los datos para tu compra.</h1>

                <form class="form-horizontal" role="form" action="demo-send.php" method="post">
                
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-sm-4 control-label">Ingresa tu correo electr&oacute;nico</label>

                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="mi@correo.cl">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="bankId" class="col-sm-4 control-label">Elige tu banco</label>

                        <div class="col-sm-8">
                            <select name="bankId" class="form-control" id="bankId">
<?php

// Debemos conocer el $receiverId y el $secretKey de ante mano.
$receiverId = 157127;
$secretKey = 'a7451c0297791cb6ff2e24070723cfe1314d3b41';

require __DIR__ . '/vendor/autoload.php';

$configuration = new Khipu\Configuration();
$configuration->setReceiverId($receiverId);
$configuration->setSecret($secretKey);
// $configuration->setDebug(true);

$client = new Khipu\ApiClient($configuration);
$banksApi = new Khipu\Client\BanksApi($client);

try {
    $response = $banksApi->banksGet();
    print_r($response);
} catch (\Khipu\ApiException $e) {
    echo print_r($e->getResponseBody(), TRUE);
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" class="btn btn-primary">Revisar orden y pagar</button>
                        </div>
                    </div>
                </form>

            </div>
</div>
                        </div>
                        </div>
                        </div>
</div>
@endsection