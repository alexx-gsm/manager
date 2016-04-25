@extends('layouts.custom')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">

            <img src="{{ URL::to('img/action.jpg') }}" alt="" class="pull-left tab-header">
            <p class="tab-header">
              Услуга
              <button type="submit" class="btn btn-default pull-right" title="Все услуги" onclick="window.location='http://' + window.location.hostname + '/actions'">
                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
              </button>
              <button type="submit" class="btn btn-default pull-right" title="Добавить новую услугу" onclick="window.location='http://' + window.location.hostname + '/action/new'">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
              </button>
            </p>
          </div>

          <div class="panel-body">
            <form action="save" method="post">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-info">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <span class="glyphicon glyphicon-tint" aria-hidden="true"></span></a><p class="pull-right">back</p>
                  </div>

                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                      <table class="table" width="100%">
                        <tr>
                          <td width="15%"><label for="name">Название</label></td>
                          <td width="85%">
                            <div class="input-group">
                              <input id="name" class="form-control" type="text" size="100%" name="name" value="" aria-describedby="name-addon" required>
                              <span class="input-group-addon" id="name-addon"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="15%"><label for="value">Стоимость</label></td>
                          <td width="85%">
                            <div class="input-group">
                              <input id="value" class="form-control" type="text" size="100%" name="value" value="" aria-describedby="value-addon" required>
                              <span class="input-group-addon" id="value-addon"><span class="glyphicon glyphicon-ruble" aria-hidden="true"></span></span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td width="15%"><label for="category">Категория</label></td>
                          <td width="85%">
                            <div class="input-group">
                              <select class="selectpicker" name="category" data-width="100%" data-live-search="true">
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select>
                              <span class="input-group-addon" id=""><span class="glyphicon glyphicon-list" aria-hidden="true"></span></span>
                            </div>
                          </td>
                        </tr>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-default pull-right btn-ok">Сохранить</button>
              <div style="clear: both"></div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


