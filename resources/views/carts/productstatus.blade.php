@extends('main')

@section('content')
    <div class="carts mt-10">
    @php $total = 0;
    @endphp
							<table class="table">
								<tbody><tr class="table_head">
									<th class="column-1">IMG</th>
									<th class="column-2"> Sản Phẩm</th>
									<th class="column-3">Giá</th>
									<th class="column-4">Số Lượng</th>
									<th class="column-5">Tổng</th>
									<th class="column-6">Trạng Thái Giao Hàng</th>
								</tr>
                                @foreach($carts as $key => $cart)
                                @php
                                $price = $cart->price * $cart->pty;
                                $total += $price;
                                @endphp
								<tr>
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px;">
										</div>
									</td>
									<td class="column-2">{{ $cart->product->name }}</td>
									<td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
									<td class="column-4">{{ $cart->pty }}</td>

									<td class="column-5">{{ number_format($price,0,'','.') }}</td>
									<td class="column-6">{!! \App\Helpers\Helper::shipPings($customer->shipping) !!}</td>

								</tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-right">Tổng Tiền:</td>
                                    <td>{{ number_format($total,0,'','.') }}</td>

                                </tr>
							</tbody>
                        </table>
    </div>
@endsection
