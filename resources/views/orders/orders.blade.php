@extends('layouts.custom')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><img src="{{ URL::to('img\orders.jpg') }}" alt="" class="pull-left tab-header">
            <p class="tab-header">
              Заказы
              <button type="submit" class="btn btn-default pull-right" onclick="window.location='http://' + window.location.hostname + '/order/new'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </p></div>

          <div class="panel-body">
            <!-- Table -->
            <table class="table table-main">
              <thead>
              <tr>
                <th>Номер</th>
                <th>Дата</th>
                <th>Объект</th>
                <th>Клиент</th>
                <th>Ценник, <span class="glyphicon glyphicon-rub" aria-hidden="true"></span></th>
              </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
                <tr id="{{ $order->id }}" onclick="clickTable('/order/', this.id)">
                  <td>{{ $order->id }}</td>
                  <td class="td-left">{{ date("Y-m-d", strtotime($order->time)) }}</td>
                  <td class="td-left">{{ $objects_list[$order->object_id] }}</td>
                  <td class="td-left">{{ $customs_list[$order->custom_id] }}</td>
                  <td class="td-left">{{ $order->total_value }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


