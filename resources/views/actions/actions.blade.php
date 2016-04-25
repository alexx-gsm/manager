@extends('layouts.custom')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><img src="{{ URL::to('img/actions.jpg') }}" alt="" class="pull-left tab-header">
            <p class="tab-header">
              Услуги
              <button type="submit" class="btn btn-default pull-right" onclick="window.location='http://' + window.location.hostname + '/action/new'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </p></div>

          <div class="panel-body">
            <!-- Table -->
            <table class="table table-main">
              <thead>
              <tr>
                <th>Название</th>
                <th>Стоимость, <span class="glyphicon glyphicon-rub" aria-hidden="true"></span></th>
                <th>Категория</th>
              </tr>
              </thead>
              <tbody>
              @foreach($actions as $action)
                <tr id="{{ $action->id }}" onclick="clickTable('/action/', this.id)">
                  <td>{{ $action->name }}</td>
                  <td>{{ $action->value }}</td>
                  <td>{{ $cat_list[$action->cat_id] }}</td>
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


