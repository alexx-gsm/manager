@extends('layouts.custom')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">

        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading"><img src="{{ URL::to('img/actions.jpg') }}" alt="" class="pull-left tab-header">
            <p class="tab-header">
              Категории
            </p>
          </div>

          <div class="panel-body">
            <div class="input-group">
              <input id="cat_new" name="cat_new" type="text" class="form-control" placeholder="название новой категории...">
              <span class="input-group-btn">
                <button class="btn btn-success" type="button" onclick="addCategory(event);">Добавить</button>
              </span>
            </div><!-- /input-group -->
            <br>
            <!-- Table -->
            <table class="table table-main">
              <thead>
              <tr>
                <th>Название</th>
              </tr>
              </thead>
              <tbody id="cat_list">
              @foreach($categories as $category)
                <tr id="{{ $category->id }}" onclick="clickTable('/category/', this.id)">
                  <td>{{ $category->name }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    function addCategory(event) {

      event.preventDefault();

      var cat_new = $("#cat_new").val();
      if (cat_new == '') {
        alert('Введите имя категории');
        return;
      }

      $.ajax({
        type: "POST",
        url: "{{ route('category/new') }}",
        data: {cat_new: cat_new, _token: "{{ csrf_token() }}"},
        success: function (data) {
          if (data.length == 0) {
            alert('Категория "' + cat_new + '" уже существует');
            return;
          }
          var item = "<tr id='" + data.id + "'><td>" + data.name + "</td></tr>";
          $("#cat_list").append(item);
          $("#cat_new").val('');
        },
        error: function (data) {
          console.log('Error:', data);
        }
      })
    }
  </script>
@endsection


