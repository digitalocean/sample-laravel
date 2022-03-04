<div class="pull-right user-login">
        <ul>

         @guest

                            <li class="btn btn-sm btn-primary">
                                <a class="btn btn-sm btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="btn btn-sm btn-primary">
                                    <a class="btn btn-sm btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="btn btn-sm btn-primary"><a  href="/posts/create">Pay</li>
                            <li  class="btn btn-sm btn-primary"><a  href="dashboard">Dashboard</a></li>

                            <li class="nav-item">
                            <!--<a href="/posts/create">Create Post</a> -->
                            <a class="btn btn-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                 </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                     </li>

                        @endguest

        <!-- END Navigation menu -->
      </div>


        <!-- END User account -->

        <!-- Navigation menu -->
        <ul class="nav-menu">
<li ><a class="active" href="/">Home2020</a></li>
          <li  ><a href="/services">Services2020</a> </li>
          <li> <a  href="/about">About</a> </li>
          <li><a   href="posts">Fees</a></li>
          <li><a  href="#">add link</a></li>
        </ul>

    </nav>
        <!-- Authentication Links -->



                    </ul>
                </div>
            </div>
        </nav>


