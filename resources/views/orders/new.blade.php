@extends('layouts.custom')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <img src="{{ URL::to('img\order.jpg') }}" alt="" class="pull-left tab-header"><p class="tab-header"> Заказ<button type="submit" class="btn btn-default pull-right" onclick="window.location='http://' + window.location.hostname + '/orders'">
                                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></button></p>
                    </div>

                    <div class="panel-body">
                        <form action="save" method="post">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <div class="panel panel-danger">
                                    <div class="panel-heading" role="tab" id="headingOne"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Детали</a></div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <table class="table table-main" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td width="15%"><label for="object_id"> Объект</label></td>
                                                    <td width="85%">
                                                        <select class="selectpicker" id="object_id" data-width="100%" data-live-search="true" name="object_id" title="Объект не выбран..." required>
                                                            @foreach( $objects as $object )
                                                                <option value="{{ $object->id }}">{{ $object->city }}, {{ $object->street }} {{ $object->building }}-{{ $object->flat }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="15%"><label for="custom_id"> Клиент</label></td>
                                                    <td width="85%">
                                                        <select class="selectpicker" id="custom_id" data-width="100%" data-live-search="true" name="custom_id" title="Клиент не выбран..." required>
                                                            @foreach( $customs as $custom )
                                                                <option value="{{ $custom->id }}">{{ $custom->name_last }} {{ $custom->name_first }} {{ $custom->name_middle }}</option>
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


