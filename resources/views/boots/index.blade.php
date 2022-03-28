@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Список товаров
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" >
                        {{ session('success') }}
                    </div>
                @endif
				<div class="form-group col-md-6">
                    <label for="exampleInputColor">Цвет</label>
                    <select name="color_id" class="form-control" id="color">
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                </div>
				<div class="form-group col-md-6">
                    <label for="exampleInputSize">Размер</label>
                    <select name="size_id" class="form-control" id="size">
                        @for ($size=40;$size<=44; $size++)
                            <option value="{{$size}}">{{$size}}</option>
                        @endfor
                    </select>
                </div>
				<div id ="product">
                    <table class="table mb-5">
                        <thead>
                        <tr>
                            <th scope="col">Товар</th>
                            <th scope="col">Цена</th>
							<th scope="col">Наличие</th>
							<th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
	<script type="application/javascript">
$( document ).ready(function() {
	
		function getProducts(colorId, size){
                $.ajax({
                    type: "POST",
                    url: '{{ route('product.list') }}',
                    data: {colorId: colorId, size: size},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(msg){
						var currentLocation = window.location.origin;
						$('#product').html('');
                        let opitionsTest = '<table class="table mb-5"><thead><tr><th scope="col" width="500px">Товар</th><th scope="col">Цена</th><th scope="col">В наличии</th><th scope="col"></th></tr></thead><tbody>';
						for (var i = 0; i < msg.length; i++) {
							opitionsTest += '<tr><td><p>';
                            opitionsTest += '<span class="font-weight-bold">Артикул:</span> '+msg[i]['vendorCode'];  
							opitionsTest += '</p><p><span class="font-weight-bold">Модель:</span> '+msg[i]['type']['name'];
							opitionsTest += '</p><p><span class="font-weight-bold">Цвет:</span> '+msg[i]['color']['name'];
							opitionsTest += '</p><p><span class="font-weight-bold">Размер:</span> '+msg[i]['size'];
							opitionsTest += '</p></td>';
							opitionsTest += '<td>'+msg[i]['price']+'₽</td>';
							opitionsTest += '<td>'+msg[i]['availability']+'</td>';
							opitionsTest += '<td><form method="post" action="{{ route('order.store') }}">';
							opitionsTest += '<input type="hidden" name="product" class="form-control" value="'+msg[i]['id']+'"/>';
							opitionsTest += '@method('post')';
                            opitionsTest += '@csrf';
							opitionsTest +='<button type="submit" class="btn btn-primary btn15">Заказать</button></form></td></tr>';
						}
						opitionsTest += '</tbody></table>';
                        $('#product').html(opitionsTest);
						if(msg.length==0)
						{
							opitionsTest = '<p><span class="font-weight-bold">К сожалению, ни одной модели данного цвета и данного размера, нет в наличии!</span>';
							$('#product').html(opitionsTest);
						}
						
                    }

                });
		}

			 
			getProducts($('#color').val(),$('#size').val());
			$('#color').change(function(){
				getProducts($(this).val(),$('#size').val());				
            });
			$('#size').change(function(){
			   
               getProducts($('#color').val(),$(this).val());				
            });
			

});
    </script>
@endsection
