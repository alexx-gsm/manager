@extends('layouts.custom')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <img src="{{ URL::to('img/card.jpg') }}" alt="" class="pull-left tab-header"><p class="tab-header">Карта<button type="submit" class="btn btn-default pull-right" onclick="window.location='http://' + window.location.hostname + '/cards'">
                                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></button></p>
                    </div>

                    <div class="panel-body">
                        <form action="save" method="post">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></a><p class="pull-right">back</p>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <table class="table" width="100%">
                                            <tr>
                                                <td width="15%"><label for="name-last">Номер</label></td>
                                                <td width="85%">
                                                    <div class="input-group">
                                                        <input id="name-first" class="form-control" type="text" size="100%" name="number" value="" aria-describedby="basic-addon2" required>
                                                        <span class="input-group-addon" id="basic-addon2">001-100</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="15%"><label for="name-first">Скидка</label></td>
                                                <td width="85%">
                                                    <select id="name-first" class="form-control selectpicker" name="type">
                                                        <option >5%</option>
                                                        <option >10%</option>
                                                        <option >15%</option>
                                                        <option >20%</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="15%"><label for="name-middle">Владелец</label></td>
                                                <td width="85%">-</td>
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


