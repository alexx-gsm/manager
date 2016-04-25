@extends('layouts.custom')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">


                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><img src="{{ URL::to('img/client.jpg') }}" alt="" class="pull-left tab-header"><p class="tab-header">Клиент<button type="submit" class="btn btn-default pull-right" onclick="window.location='http://' + window.location.hostname + '/customs'">
                                <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> ВСЕ</button></p>

                    </div>
                    <div class="panel-body">

                    <form action="save" method="post">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                            <div class="panel panel-danger">
                                <div class="panel-heading" role="tab" id="headingOne"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> ФИО</a></div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <table class="table" width="100%">
                                            <tr>
                                                <td width="15%"><label for="name-last">Фамилия</label></td>
                                                <td width="85%"><input name="name_last" id="name-last" class="form-control" type="text" size="100%" value="" required></td>
                                            </tr>
                                            <tr>
                                                <td width="15%"><label for="name-first">Имя</label></td>
                                                <td width="85%"><input name="name_first" id="name-first" class="form-control" type="text" size="100%" value="" required></td>
                                            </tr>
                                            <tr>
                                                <td width="15%"><label for="name-middle">Очество</label></td>
                                                <td width="85%"><input name="name_middle" id="name-middle" class="form-control" type="text" size="100%" value=""></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="headingTwo"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> Контакты</a></div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table" width="100%">
                                            <tr>
                                                <td width="15%"><label for="name-last">Телефон</label></td>
                                                <td width="85%"><input name="phone" id="name-last" class="form-control" type="text" size="100%" value="" required></td>
                                            </tr>
                                            <tr>
                                                <td width="15%"><label for="name-first">Почта</label></td>
                                                <td width="85%"><input name="email" id="name-first" class="form-control" type="text" size="100%" value="" required></td>
                                            </tr>
                                            <tr>
                                                <td width="15%"><label for="name-middle">Другое</label></td>
                                                <td width="85%"><input name="others" id="name-middle" class="form-control" type="text" size="100%" value="" placeholder="ICQ=..."></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-info">
                                <div class="panel-heading" role="tab" id="headingThree"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span> Карта</a></div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">

                                            <label for="cards">Карта клиента : </label>
                                            <select class="selectpicker" name="card_id" id="cards" data-width="75%" disabled>
                                                <option value=""></option>
                                            </select>
                                            <button type="button" class="btn btn-info pull-right" onclick="getCards(event)">Изменить</button>

                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-warning">
                                <div class="panel-heading" role="tab" id="headingFour"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Объекты</a><p class="pull-right"><span class="badge">4</span></p></div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table" width="100%">
                                            <tr>
                                                <td width="15%"><label for="name-last">Телефон</label></td>
                                                <td width="85%"><input id="name-last" class="form-control" type="text" size="100%" value=""></td>
                                            </tr>
                                            <tr>
                                                <td width="15%"><label for="name-first">Почта</label></td>
                                                <td width="85%"><input id="name-first" class="form-control" type="text" size="100%" value=""></td>
                                            </tr>
                                            <tr>
                                                <td width="15%"><label for="name-middle">Другое</label></td>
                                                <td width="85%"><input id="name-middle" class="form-control" type="text" size="100%" value="" placeholder="ICQ=..., skype=..."></td>
                                            </tr>
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

