@extends('layouts.custom')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">


                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><img src="{{ URL::to('img/client.jpg') }}" alt="" class="pull-left tab-header"><p class="tab-header">Клиент<button type="submit" class="btn btn-default pull-right" onclick="window.location='http://' + window.location.hostname + '/customs'">
                                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></button></p>

                    </div>
                    <div class="panel-body">

                        <form action="save" method="post">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <div class="panel panel-danger">
                                    <div class="panel-heading" role="tab" id="headingOne"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Название</a></div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <table class="table" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td width="15%"><label for="name"> Название</label></td>
                                                    <td width="85%"><input name="name" id="name" class="form-control" type="text" size="100%" value="" required></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-success">
                                    <div class="panel-heading" role="tab" id="headingTwo"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span class="glyphicon glyphicon-road" aria-hidden="true"></span> Адрес</a></div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <table class="table" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td width="15%"><label for="city">Город</label></td>
                                                    <td width="85%"><input name="city" id="city" class="form-control" type="text" size="100%" value="" required></td>
                                                </tr>
                                                <tr>
                                                    <td width="15%"><label for="street">Улица</label></td>
                                                    <td width="85%"><input name="street" id="street" class="form-control" type="text" size="100%" value="" required></td>
                                                </tr>
                                                <tr>
                                                    <td width="15%"><label for="building">Дом/Строение</label></td>
                                                    <td width="85%"><input name="building" id="building" class="form-control" type="text" size="100%" value="" required></td>
                                                </tr>
                                                <tr>
                                                    <td width="15%"><label for="flat">Квартира/Офис</label></td>
                                                    <td width="85%"><input name="flat" id="flat" class="form-control" type="text" size="100%" value="" ></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-default pull-right btn-ok" onclick="setEnabled()">Сохранить</button>
                            <div style="clear: both"></div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<script>
function setEnabled() {
    var select = $('select#cards');
    select.prop('disabled', false);
}

    function getCards(event)
    {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ route('card/list') }}",
            data: {card_id: "null", _token: "{{ csrf_token() }}"},
            success: function (data) {
                console.log(data);
                var select = $('select#cards');
                select.html(data);
                select.prop('disabled', false);
                $('.selectpicker').selectpicker('refresh');
            },
            error: function (data) {
                console.log('Error:', data);
            }
        })
    }
</script>

