<header>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <p id="brand"><a href="{{ route('home') }}">ЧистоДа</a></p>
      </div>

      <ul class="nav navbar-nav">
        <li><a href="{{ url('orders') }}">ЗАКАЗЫ</a></li>
        <li role="presentation" class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">СПРАВОЧНИКИ <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('/cards') }}">карты</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('/objects') }}">объекты</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('/actions') }}">Услуги</a></li>
            <li><a href="{{ url('/categories') }}">Категории</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ url('/customs') }}">клиенты</a></li>
          </ul>
        </li>
        <li class="separator">&nbsp;</li>
        <li><a href="#">СОТРУДНИКИ</a></li>
        <li><a href="{{ url('#') }}">ГАЛЕРЕЯ</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="{{ url('/#') }}">ОС-Нова</a></li>
      </ul>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
</header>