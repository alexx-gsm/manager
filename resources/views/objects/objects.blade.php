@extends('layouts.custom')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><img src="{{ URL::to('img/object.png') }}" alt="" class="pull-left tab-header"><p class="tab-header">
              Объекты
              <button type="submit" class="btn btn-default pull-right" onclick="window.location='http://' + window.location.hostname + '/object/new'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </p></div>

          <div class="panel-body">
            <!-- Table -->
            <table class="table table-main">
              <thead>
              <tr>
                <th>Название</th>
                <th>Город</th>
                <th>Улица</th>
                <th>дом</th>
                <th>квартира</th>
              </tr>
              </thead>
              <tbody>
              @foreach($objects as $object)
                <tr id="{{ $object->id }}" onclick="clickTable('/object/', this.id)">
                  <td>{{ $object->name }}</td>
                  <td>{{ $object->city }}</td>
                  <td>{{ $object->street }}</td>
                  <td>{{ $object->building }}</td>
                  <td>{{ $object->flat }}</td>
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


