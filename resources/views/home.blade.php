@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card main-screen">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <ul class="nav nav-pills mb-3" id="balance-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="rub-tab" data-toggle="tab" href="#rub-area" role="tab" aria-controls="rub-area" aria-selected="true">RUB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="usd-tab" data-toggle="tab" href="#usd-area" role="tab" aria-controls="usd-area" aria-selected="false">USD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="btc-tab" data-toggle="tab" href="#btc-area" role="tab" aria-controls="btc-area" aria-selected="false">BTC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="eth-tab" data-toggle="tab" href="#eth-area" role="tab" aria-controls="eth-area" aria-selected="false">ETH</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="balance-tabs-content">
                        <div class="tab-pane fade show active" id="rub-area" role="tabpanel" aria-labelledby="rub-tab">
                            <p>Баланс</p>
                            <p class="balance">{{ Auth::User()->getWallet('RUB')->balance }} RUB</p>
                        </div>
                        <div class="tab-pane fade" id="usd-area" role="tabpanel" aria-labelledby="usd-tab">
                            <p>Баланс</p>
                            <p class="balance">{{ Auth::User()->getWallet('USD')->balance }} USD</p>
                        </div>
                        <div class="tab-pane fade" id="btc-area" role="tabpanel" aria-labelledby="btc-tab">
                            <p>Баланс</p>
                            <p class="balance">{{ Auth::User()->getWallet('BTC')->balance }} BTC</p>
                        </div>
                        <div class="tab-pane fade" id="eth-area" role="tabpanel" aria-labelledby="eth-tab">
                            <p>Баланс</p>
                            <p class="balance">{{ Auth::User()->getWallet('ETH')->balance }} ETH</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
