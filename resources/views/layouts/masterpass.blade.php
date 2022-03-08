<!-- Map Page
@ extends('layouts.mastermap')  -->
    <!-- END Main container -->
    <!-- Site footer -->


@include('includes.headpass')
@include('includes.navmenupass')
@include('includes.messages')
@include('inc.messages')


@yield('content')

    </main>
    
    <!-- END Main container -->
    <!-- Site footer 
    
    http://exam.acpaglobal.net/exam/start/66/Mook%20Exam/NBC/SSC/30-->
 @include('includes.footer')
