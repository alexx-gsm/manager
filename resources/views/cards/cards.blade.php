@extends('layouts.custom')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><img src="{{ URL::to('img/cards.png') }}" alt="" class="pull-left tab-header">
            <p class="tab-header">
              Карты
              <button type="submit" class="btn btn-default pull-right" onclick="window.location='http://' + window.location.hostname + '/card/new'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </p></div>

          <div class="panel-body">
            <!-- Table -->
            <table class="table table-main">
              <thead>
              <tr>
                <th>Номер</th>
                <th>Скидка</th>
                <th>Клиент</th>
              </tr>
              </thead>
              <tbody>
              @foreach($cards as $card)
                <tr id="{{ $card->id }}" onclick="clickTable('/card/', this.id)">
                  <td>{{ $card->number }}</td>
                  <td>{{ $card->type }}</td>
                  <td>{{ $customs[$card->custom_id] ?? '' }}</td>
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


