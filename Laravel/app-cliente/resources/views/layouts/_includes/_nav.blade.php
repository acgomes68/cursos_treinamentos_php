  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
   <div class="container">
       <a class="navbar-brand" href="{{ url('/') }}">
           {{ config('app.name', 'appCliente') }}
       </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>

       <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <!-- Left Side Of Navbar -->
           
           <ul class="navbar-nav">
           @guest
					<li>&nbsp;</li>
           @else
           		<li><a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a></li>
					<li><a class="nav-link" href="{{ route('cliente.index') }}">{{ __('Cliente') }}</a></li>
           @endguest
           </ul>

           <!-- Right Side Of Navbar -->
           <ul class="navbar-nav ml-auto">
               <!-- Authentication Links -->
               @guest
                   <li><a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a></li>
                   <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
               @else
                   <li class="nav-item dropdown">
                       <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                           {{ Auth::user()->name }} <span class="caret"></span>
                       </a>

                       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                               {{ __('Sair') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               @csrf
                           </form>
                       </div>
                   </li>
               @endguest
           </ul>
       </div>
   </div>
  </nav>
