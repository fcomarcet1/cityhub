<!--header section starts -->

      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">CityHub</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
               <li><a href="{{ route('join.client') }}">Suggest Us</a></li>
               <li><a href="{{ route('join.client') }}">Join Us</a></li>
                        @guest
                            <li id="loginbtn"><a href="{{ route('login') }}">Login/Signup</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                      <a href="{{ route('user.orders') }}">My Orders</a>
                                      <a href="#">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Account<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li> -->
              <li><a href="#" id="cart">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                      <span class="badge">
                            {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
                      </span>
                  </a>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

      <!-- cart dropdown start -->
            <div class="container">
                  <div class="shopping-cart" id="shopping-cart">
                        <div class="shopping-cart-header">
                          <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</span>
                          <div class="shopping-cart-total">
                            <span class="lighter-text">Total: {{ Session::has('cart') ? Session::get('cart')->totalPrice : '0' }}</span>
                            <span class="main-color-text"></span>
                          </div>
                        </div> <!--end shopping-cart-header -->

                        @if(Session::has('cart'))
                        <ul class="shopping-cart-items">
                          <li class="clearfix">
                            <span class="item-name">Section under construction</span>
                            <span class="item-price"></span>
                            <span class="item-quantity"></span>
                          </li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="button">Checkout</a>
                        @else
                        <div>
                          <p>Cart is empty</p>
                        </div>
                        @endif
                  </div> <!--end shopping-cart -->
            </div> <!--end container -->
      <!-- cart dropdown ends -->

<!-- header section ends-->