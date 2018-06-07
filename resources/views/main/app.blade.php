<!DOCTYPE html>
<html>
<head>
	<title>Warehouse Management System</title>

	
   <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">

    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="{{ asset('js/popper.js') }}" defer></script>
    <script src="{{ asset('js/datatables.js') }}" defer></script>
    
</head>
<body style="background-color: #c5c5c5">


 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="/inventory">Inventory</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/transactions">Warehouse Movements</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Transfer
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/transactions/issue_out">Issue Out</a>
        <a class="dropdown-item" href="/transactions/issue_in">Issue In</a>
        <a class="dropdown-item" href="/transactions/internal">Internal Transfer</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Create Item
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/categories/create">Create Category</a>
        <a class="dropdown-item" href="/warehouses/create">Create Warehouse</a>
        <a class="dropdown-item" href="/locations/create">Create Location</a>
        <a class="dropdown-item" href="/products/create">Create Poduct</a>
        
        
         
        
      </div>
    </li>

  </ul>

  <ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
  </ul>
</nav> 

<br>
<br>

	@yield('content')

</body>

<script>

  @yield('scripts')

</script>

</html>