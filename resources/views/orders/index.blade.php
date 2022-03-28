@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Мои заказы
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" >
                        {{ session('success') }}
                    </div>
                @endif
				
                    <table class="table mb-5">
                        <thead>
                        <tr>
                            <th scope="col">Товар</th>
                            <th scope="col">Цена</th>
							<th scope="col">Дата заказа</th>
                        </tr>
                        </thead>
                        <tbody>
						@foreach($orders as $order)
                            <tr>
                                <td>
									<p><span class="font-weight-bold">Артикул:</span> {{$order->product->vendorCode}}</p>
									<p><span class="font-weight-bold">Модель:</span> {{$order->product->type->name}}</p>
									<p><span class="font-weight-bold">Цвет:</span> {{$order->product->color->name}}</p>
									<p><span class="font-weight-bold">Размер:</span> {{$order->product->size}}</p>
                                </td>
                                <td>
                                    {{$order->price}}₽
                                </td>
								<td>
                                    {{$order->created_at}}
                                </td>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    
@endsection
