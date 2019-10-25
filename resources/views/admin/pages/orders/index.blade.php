@extends('admin.layouts.app')

@section('content')
    <h2 class="content-heading">Заказы</h2>
    <div class="block">
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center font-w600">№</th>
                            <th class="text-center font-w600">Заказчик</th>
                            <th class="text-center font-w600">Номер телефона</th>
                            <th class="text-center font-w600">Email</th>
                            <th class="text-center font-w600">Общая сумма</th>
                            <th class="text-center font-w600">Дата</th>
                            <th class="text-center font-w600">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center">{{ $order->id }}</td>
                                <td class="text-center">{{ $order->company_name }} | {{ $order->name }}</td>
                                <td class="text-center">{{ $order->phone_number }}</td>
                                <td class="text-center">{{ $order->email }}</td>
                                <td class="text-center">{{ number_format($order->getTotalAmount(), 0, ',', ' ') }} сум</td>
                                <td class="text-center">{{ $order->created_at }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-alt-primary"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
