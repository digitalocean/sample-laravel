<!-- Map Page

@include('includes.navmenumap')

@ extends('layouts.mastermap')  -->
    <!-- END Main container -->
    <!-- Site footer -->


@include('includes.head')
@include('includes.navmenumap')

@include('includes.messages')
@include('includes.messages')
@yield('content')

    
    
    <!-- END Main container -->
    <!-- Site footer -->
 @include('includes.footer')
