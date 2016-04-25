@extends('layouts.custom')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading"><img src="{{ URL::to('img/clients.jpg') }}" alt="" class="pull-left tab-header"><p class="tab-header">
                        Клиенты
                        <button type="submit" class="btn btn-default pull-right" onclick="window.location='http://' + window.location.hostname + '/custom/new'">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                        </p></div>

                    <div class="panel-body">
                        <!-- Table -->
                        <table class="table table-main">
                            <thead>
                                <tr>
                                    <th>ФИО</th>
                                    <th>телефон</th>
                                    <th>e-mail</th>
                                    <th>карта</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customs as $custom)
                                <tr id="{{ $custom->id }}" onclick="clickTable('/custom/', this.id)">
                                    <td class="td-left">{{$custom->name_last . ' ' . $custom->name_first . ' ' . $custom->name_middle}}</td>
                                    <td class="td-left">{{ $custom->phone }}</td>
                                    <td class="td-left">{{ $custom->email }}</td>
                                    <td class="td-left">
                                        @if (!$custom->card_id == 0)
                                            <img src="{{ URL::to('img/card_50.png') }}" alt=""><span> {{ $cards[$custom->card_id] }}</span>
                                        @endif
                                    </td>
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


