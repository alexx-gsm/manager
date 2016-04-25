@extends('layouts.custom')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">


        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><img src="{{ URL::to('img\order.jpg') }}" alt="" class="pull-left tab-header">
            <p class="tab-header">
              Заказ
              <button type="submit" class="btn btn-default pull-right" title="Все заказы" onclick="window.location='http://' + window.location.hostname + '/orders'">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
              </button>
              <button type="submit" class="btn btn-default pull-right" title="Новый заказ" onclick="window.location='http://' + window.location.hostname + '/order/new'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </p>

          </div>
          <div class="panel-body">

            <form action="save" method="post">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-danger">
                  <div class="panel-heading" role="tab" id="headingOne"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Детали</a><p class="pull-right">{{ $order->id }}</p></div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      <table class="table" width="100%">
                        <tbody>
                        <tr>
                          <td width="15%"><label for="object_id"> Объект</label></td>
                          <td width="85%">
                            <select class="selectpicker" id="object_id" data-width="100%" data-live-search="true" name="object_id">
                              <?php $selected = ''; ?>
                              @foreach( $objects as $object )
                                @if ($object->id == $order->object_id)
                                  <?php $selected = 'selected'; ?>
                                @endif

                                <option value="{{ $object->id }}" <?=$selected; ?> >{{ $object->city }}, {{ $object->street }} {{ $object->building }}-{{ $object->flat }}</option>
                                <?php $selected = ''; ?>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="15%"><label for="custom_id"> Клиент</label></td>
                          <td width="85%">
                            <select class="selectpicker" id="custom_id" data-width="100%" data-live-search="true" name="custom_id">
                              <?php $selected = ''; ?>
                              @foreach( $customs as $custom )
                                @if ($custom->id == $order->custom_id)
                                  <?php $selected = 'selected'; ?>
                                @endif
                                <option value="{{ $custom->id }}" <?=$selected; ?> >{{ $custom->name_last }} {{ $custom->name_first }} {{ $custom->name_middle }}</option>
                                <?php $selected = ''; ?>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="15%"><label for="time"> Время</label></td>
                          <td width="85%"><input name="time" id="time" class="form-control" type="date" size="100%" value="{{ $time }}" required></td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="panel panel-success">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                      Выполненные работы
                    </a>
                    <span id="header-total" class="pull-right"></span>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                      <table class="table table-main" width="100%">
                        <thead>
                        <tr>
                          <th width="50%">Услуга</th>
                          <th width="15%">Цена, <span class="glyphicon glyphicon-rub" aria-hidden="true"></span></th>
                          <th width="10%">Кол-во</th>
                          <th width="15%">Всего, <span class="glyphicon glyphicon-rub" aria-hidden="true"></span></th>
                          <th width="10%"></th>
                        </tr>
                        </thead>
                        <tbody id="works">
                        {{ '', $total = 0 }}
                        @foreach($works as $work)
                          <tr>
                            <td>{{ $actions[$work->action_id] }}</td>
                            <td>{{ $work->value }}</td>
                            <td>{{ $work->count }}</td>
                            <td>{{ $work->total }}</td>
                            <td>
                              <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                              <button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            </td>
                          </tr>
                          {{ '', $total += (int)$work->total }}
                        @endforeach
                        <script>
                          $('#header-total').html({{ $total }} + ' <span class="glyphicon glyphicon-rub" aria-hidden="true"></span>');
                        </script>
                        <tr class="no-point bold">
                          <td></td>
                          <td></td>
                          <td>{{ 'Итого: ' }}</td>
                          <td>{{ $total }}</td>
                          <td>
                            <button id="btn-add" type="button" class="btn btn-default btn-xs" onclick="reWorks()"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                            <button id="btn-add" type="button" class="btn btn-success btn-xs" onclick="addWorks()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
              <button type="submit" class="btn btn-default pull-right btn-ok">Сохранить</button>
              <div style="clear: both"></div>
              <input type="hidden" name="id" value="{{ $order->id }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

  <script>

    function addWorks()
    {
      $.ajax({
        type: "POST",
        url: "{{ route('action/list') }}",
        data: {_token: "{{ csrf_token() }}"},
        success: function (data) {
          $("tbody#works").append('<tr>' +
            '<td><select class="selectpicker works" name="name" id="action_name" data-width="100%" title="выбери услугу ..." data-size="10" required>' + data + '</select></td>' +
            '<td><div class="input-group"><input type="text" class="form-control" name="value" required><span class="input-group-addon">.00</span></div></td>' +
            '<td><div class="input-group"><input type="text" class="form-control" name="count" required></div></td>' +
            '<td colspan="2"><button id="btn-insert" type="button" class="btn btn-success" onclick="insertWork()"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>добавить</button></td>' +
            '</tr>');

          $('.works').selectpicker('refresh');
          $('#btn-add').attr("disabled", true);

        },
        error: function (data) {
          console.log('Error:', data);
        }
      })
    }
    
    function insertWork()
    {
      $.ajax({
        type: "POST",
        url: "{{ route('work/save') }}",
        data: {
              order_id:   "{{ $order->id }}",
              action_id:  $('.works option:selected').val(),
              count:      $('input[name="count"]').val(),
              value:      $('input[name="value"]').val(),
              _token:     "{{ csrf_token() }}"
        },
        success: function (data) {
          $("tbody#works").html(data['select']);
          $('#header-total').html(data['total'] + ' <span class="glyphicon glyphicon-rub" aria-hidden="true"></span>');
        },
        error: function (data) {
          console.log('Error:', data);
        }
      })
    }

    function reWorks()
    {

    }
  </script>
@endsection
