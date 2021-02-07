@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card main-screen">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="inline-block mb-0">Dashboard</p>
                        @if (\Auth::user()->isAdmin())
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-secondary" href="/users" >Пользователи</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="nav nav-pills mb-3 d-none" id="balance-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-secondary" id="rub-tab" data-toggle="tab" href="#rub-area" role="tab" aria-controls="rub-area" aria-selected="false">RUB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-secondary" id="usd-tab" data-toggle="tab" href="#usd-area" role="tab" aria-controls="usd-area" aria-selected="false">USD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-secondary" id="btc-tab" data-toggle="tab" href="#btc-area" role="tab" aria-controls="btc-area" aria-selected="false">BTC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-secondary" id="eth-tab" data-toggle="tab" href="#eth-area" role="tab" aria-controls="eth-area" aria-selected="false">ETH</a>
                        </li>
                    </ul>
                    <div class="tab-content pb-3" id="balance-tabs-content">
                        <div class="tab-pane fade show active" id="dhb-area" role="tabpanel" aria-labelledby="dhb-tab">
                            <p class="mb-0"><strong>1-й этап </strong><br />Цена 1 DHB = 0,05 USD</p>
                            <div class="progress w-100">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{($balances / 2000000) * 100 }}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class=" mb-4">Продано {{number_format($balances, 0, ',', ' ')}} DHB из 2 000 000 DHB</p>
                            <p class="mb-0">Ваш баланс</p>
                            <p class="balance pb-3">{{ number_format(Auth::User()->getWallet('DHB')->balance, 2, ',',' ') }} DHB = {{ number_format((Auth::User()->getWallet('DHB')->balance * 0.05), 2, ',' , ' ')}} USD</p>
                            <div class="social-links d-flex mt-3">

                                <a href="https://t.me/DA_HUB" target="_blank" class="btn btn-primary mr-3">Паблик</a>

                                <a href="http://t.me/DA_HUB_CHAT" target="_blank" class="btn btn-success mr-3">Чат</a>

                                <a href="https://telegra.ph/Investicionnoe-predlozhenie-ot-sozdatelej-proekta-DaHub-01-30" target="_blank" class="btn btn-secondary">О проекте</a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rub-area" role="tabpanel" aria-labelledby="rub-tab">
                            <p>Balance</p>
                            <p class="balance">{{ Auth::User()->getWallet('RUB')->balance }} RUB</p>
                        </div>
                        <div class="tab-pane fade" id="usd-area" role="tabpanel" aria-labelledby="usd-tab">
                            <p>Balance</p>
                            <p class="balance">{{ Auth::User()->getWallet('USD')->balance }} USD</p>
                        </div>
                        <div class="tab-pane fade" id="btc-area" role="tabpanel" aria-labelledby="btc-tab">
                            <p>Balance</p>
                            <p class="balance">{{ Auth::User()->getWallet('BTC')->balance }} BTC</p>
                        </div>
                        <div class="tab-pane fade" id="eth-area" role="tabpanel" aria-labelledby="eth-tab">
                            <p>Balance</p>
                            <p class="balance">{{ Auth::User()->getWallet('ETH')->balance }} ETH</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
