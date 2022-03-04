<!-- Map Page
@ extends('layouts.mastermap')  -->
    <!-- END Main container -->
    <!-- Site footer -->


@include('includes.headmap')
@include('includes.navmenuprofile')
@include('includes.messages')
@include('inc.messages')

@yield('content')


    </main>
    
    <!-- END Main container -->
    <!-- Site footer -->
 @include('includes.footer')
