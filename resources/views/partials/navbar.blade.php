<nav class="navbar navbar-expand-lg bg-light py-3 mb-4">
   <div class="container ">
      <a class="navbar-brand d-flex align-items-center" href="{{ route('product.index') }}"><img
            src="{{ asset('assets/svg/linear_shop.svg') }}" alt="shop" width="20" height="20" class="me-1"> LaraShop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ms-auto align-items-center mb-2 mb-lg-0">
            <li class="nav-item me-2">
               <a class="nav-link d-flex align-items-center" aria-current="page"
                  href="{{ route('product.shoppingCart') }}">
                  <img src="{{ asset('assets/svg/linear_shoppingcart.svg') }}" alt="cart" width="16" height="16"
                     class="me-1">
                  Shopping
                  Cart
                  <span class="ms-2 badge text-bg-secondary">{{ Session::has('cart') ?
                     Session::get('cart')->totalQty : ''
                     }}</span>
               </a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link d-flex align-items-center dropdown-toggle " href="#" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('assets/svg/linear_user.svg') }}" alt="user" width="16" height="16" class="me-1">
                  User
                  Account
               </a>
               <ul class="dropdown-menu">
                  @if (Auth::check())
                  <li>
                     <a class="dropdown-item" href="{{ route('user.profile') }}">User Profile</a>
                  </li>
                  <hr class="dropdown-divider">
                  <li>
                     <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                  </li>
                  @else
                  <li>
                     <a class="dropdown-item" href="{{ route('user.signup') }}">Signup</a>
                  </li>
                  <hr class="dropdown-divider">
                  <li>
                     <a class="dropdown-item" href="{{ route('user.signin') }}">Signin</a>
                  </li>
                  @endif
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>