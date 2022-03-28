@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Магазин БотинкиРУ') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <p>Интернет-магазин "БотинкиРУ" - один из самых больших сетевых магазинов кроссовок в России и СНГ.
							Мы предлагаем вам большую коллекцию ботинок от ведущих мировых брендов.</p>
                        <p>Для заказа ботинок вам необходимо зарегистрироваться</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
