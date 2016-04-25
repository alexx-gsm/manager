@extends('layouts.custom')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">
            @if ( $card->type == '5%')
              <?php $image = 'img/card_05.jpg';
              $color = 'danger';
              $star = '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
              $title =''; ?>
            @elseif($card->type == '10%')
              <?php $image = 'img/card_10.jpg';
              $color = 'info';
              $star = str_repeat('<span class="glyphicon glyphicon-star" aria-hidden="true"></span>', 2);
              ?>
            @elseif($card->type == '15%')
              <?php $image = 'img/card_15.jpg';
              $color = 'warning';
              $star = str_repeat('<span class="glyphicon glyphicon-star" aria-hidden="true"></span>', 3);
              ?>
            @elseif($card->type == '20%')
              <?php $image = 'img/card_20.jpg';
              $color = 'success';
              $star = str_repeat('<span class="glyphicon glyphicon-star" aria-hidden="true"></span>', 4);
              ?>
            @else
              <?php $image = 'img/card.jpg';
              $color = 'primary';
              $star = '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
              ?>
            @endif
            <img src="{{ URL::to($image) }}" alt="" class="pull-left tab-header">
            <p class="tab-header">
              Карта
              <button type="submit" class="btn btn-default pull-right" title="Все карты" onclick="window.location='http://' + window.location.hostname + '/cards'">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
              </button>
              <button type="submit" class="btn btn-default pull-right" title="Добавить новую карту" onclick="window.location='http://' + window.location.hostname + '/card/new'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </p>
          </div>

          <div class="panel-body">
            <form action="save" method="post">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-{{ $color }}">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <?=$star; ?></a><p class="pull-right">back</p>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      <table class="table" width="100%">
                        <tr>
                          <td width="15%"><label for="name-last">Номер</label></td>
                          <td width="85%" colspan="2">
                            <div class="input-group">
                              <input id="name-first" class="form-control" type="text" size="100%" name="number" value="{{ $card->number }}" aria-describedby="basic-addon2" required>
                              <span class="input-group-addon" id="basic-addon2">001-100</span>
                            </div>
                          </td>

                        </tr>
                        <tr>
                          <td width="15%"><label for="name-first">Скидка</label></td>
                          <td width="85%" colspan="2">
                            <select id="name-first" class="form-control selectpicker" name="type">
                              <option {{ $card->type == '5%' ? 'selected' : '' }}>5%</option>
                              <option {{ $card->type == '10%' ? 'selected' : '' }}>10%</option>
                              <option {{ $card->type == '15%' ? 'selected' : '' }}>15%</option>
                              <option {{ $card->type == '20%' ? 'selected' : '' }}>20%</option>
                            </select>
                          </td>

                        </tr>
                        <tr>
                          <td><label for="name-middle">Владелец</label></td>
                          <td id="reset_name">
                            @if (!$custom_name == '')
                              {{ $custom_name }}
                              </td><td width="10%" id="reset_btn" onclick="reset()"><button type="button" class="btn btn-danger">Сброс</button>
                            @endif
                          </td>
                        </tr>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-default pull-right btn-ok">Сохранить</button>
              <div style="clear: both"></div>
              <input type="hidden" name="id" value="{{ $card->id }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function reset()
    {
      $.ajax({
        type: "POST",
        url: "{{ route('card/reset') }}",
        data: {
          card_id:   "{{ $card->id }}",
          custom_id:  "{{ $card->custom_id }}",
          _token:     "{{ csrf_token() }}"
        },
        success: function (data) {
          if (data == 'OK') {
            $("td#reset_name").html('');
            $("td#reset_btn").html('');
          }

        },
        error: function (data) {
          console.log('Error:', data);
        }
      })
    }
  </script>

@endsection

