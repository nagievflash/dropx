@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card main-screen">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="inline-block mb-0">Dashboard</p>
                        @if (\Auth::user()->isAdmin())
                        <div class="d-flex justify-content-end users-button">
                            <a class="btn btn-primary" href="/users" >
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                           viewBox="0 0 388.227 388.227" style="enable-background:new 0 0 388.227 388.227;" xml:space="preserve">
                                <g>
                                    <path d="M194.113,190.505c36.691,0,66.438-36.129,66.438-80.695c0-44.567-9.768-80.696-66.438-80.696
                                        c-56.672,0-66.438,36.129-66.438,80.696C127.676,154.376,157.422,190.505,194.113,190.505z"/>
                                    <path d="M319.455,310.459c-1.229-77.637-11.369-99.759-88.959-113.763c0,0-10.924,13.917-36.381,13.917
                                        c-25.457,0-36.379-13.917-36.379-13.917c-76.744,13.85-87.502,35.645-88.916,111.24c-0.115,6.173-0.168,6.497-0.189,5.78
                                        c0.004,1.343,0.01,3.826,0.01,8.157c0,0,18.473,37.239,125.475,37.239s125.477-37.239,125.477-37.239
                                        c0-2.782,0.002-4.718,0.004-6.033C319.576,316.283,319.533,315.424,319.455,310.459z"/>
                                    <path d="M286.313,176.097c29.801,0,53.959-29.343,53.959-65.539c0-36.197-7.932-65.54-53.959-65.54
                                        c-7.742,0-14.404,0.833-20.135,2.388c10.631,19.598,12.088,43.402,12.088,62.403c0,21.514-5.832,42.054-16.572,59.061
                                        C269.076,173.48,277.441,176.097,286.313,176.097z"/>
                                    <path d="M388.111,273.521c-1-63.055-9.234-81.022-72.252-92.396c0,0-8.871,11.304-29.547,11.304c-0.855,0-1.684-0.026-2.5-0.063
                                        c13.137,5.923,25.088,14.17,33.889,26.238c15.215,20.863,18.713,48.889,19.435,90.062c42.397-8.378,51.086-25.873,51.086-25.873
                                        c0-2.28,0-3.844,0.004-4.913C388.209,278.256,388.174,277.582,388.111,273.521z"/>
                                    <path d="M101.912,176.097c8.873,0,17.236-2.617,24.621-7.226c-10.74-17.007-16.572-37.547-16.572-59.061
                                        c0-19.002,1.457-42.806,12.086-62.403c-5.73-1.555-12.391-2.388-20.135-2.388c-46.027,0-53.957,29.343-53.957,65.54
                                        C47.955,146.754,72.113,176.097,101.912,176.097z"/>
                                    <path d="M104.412,192.365c-0.814,0.037-1.643,0.063-2.5,0.063c-20.676,0-29.547-11.304-29.547-11.304
                                        c-63.016,11.374-71.252,29.34-72.25,92.396c-0.065,4.062-0.098,4.735-0.115,4.358c0.002,1.069,0.004,2.633,0.004,4.913
                                        c0,0,8.69,17.495,51.084,25.873c0.725-41.172,4.221-69.198,19.438-90.062C79.326,206.536,91.275,198.288,104.412,192.365z"/>
                                </g>

                                </svg>
                                <span>Пользователи</span>
                            </a>
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
                            <p><strong>1-й этап </strong></p>
                            <p style="margin-bottom:35px;">Цена 1 DHB = 0,05 USD</p>
                            <div class="progress w-100">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{($balances / 2000000) * 100 }}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p style="margin-top:10px; font-size:18px;">Продано {{number_format($balances, 0, ',', ' ')}} DHB из 2 000 000 DHB</p>
                            <p class="our_balance"><strong>Ваш баланс</strong></p>
                            <p>{{ number_format(Auth::User()->getWallet('DHB')->balance, 2, ',',' ') }} DHB = {{ number_format((Auth::User()->getWallet('DHB')->balance * 0.05), 2, ',' , ' ')}} USD</p>

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
