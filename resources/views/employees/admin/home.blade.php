@extends('layout')
@section('title')
@section('menu_home', 'active')
@section('mycontent')
	<h1>Admin Home Page</h1>
<!--------------------------------Admin LOGOUT----------------------------------------------->
          <li>
            <a class="item" href="{{ route('admin-logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    
                    <form id="logout-form" action="{{ route('admin-logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
          </li>
<!--------------------------------END Amin LOGOUT----------------------------------------------->
<br>
	<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit modi maiores non consequuntur debitis, ipsam beatae consequatur, voluptatibus corrupti in magni eaque illum odio vero, unde facere voluptate perspiciatis recusandae.</div>
	<div>Modi tenetur voluptatum dicta alias, illum, blanditiis deleniti possimus exercitationem impedit laborum distinctio ea vel cupiditate aliquid suscipit sunt iusto fugiat explicabo rem id fuga nihil. Dolorum reiciendis iste explicabo!</div>
	<div>Libero aliquam nostrum ipsam maiores quod officiis reiciendis facilis, sunt quasi impedit eum neque itaque mollitia atque quidem consectetur cum quibusdam tenetur numquam accusamus possimus ullam repellat cupiditate. Dicta, eum.</div>
	<div>Natus, dolores numquam dolorem harum facere sequi corporis iure ipsa culpa, labore iste. Dolores suscipit neque consequatur a iste. Magni nihil, esse repudiandae vel dolorum quia saepe perspiciatis ipsum nam!</div>
@endsection