@extends('layouts.master')
@section('PageTitle', 'AI')
@section('Description',('This is Home Page Description'))
@section('content')
<!-- Site header -->
    <header class="site-header size-lg text-center" style="background-color: #ad78bc;">
  <div class="container">
    <div class="col-xs-12">
      <h2>There are <mark>ADMIN ADMIN +</mark>
   Quotes right now!
   <h5 class="font-alt">Search Quotes in one minute</h5>
   <br>
 <!--  Search Places   -->
 @includeif('includes.messages')
 @include('includes.searchform')

 </h2>
    </div>
  </div>
</header>
@auth()


@component('components.alerts')
@slot('class')
    success
@endslot
@slot('alertTitle')
    Welcome to this website
@endslot
@endcomponent
@endauth

@guest


@component('components.alerts')
@slot('class')
    danger
@endslot
@slot('alertTitle')
   You're not Welcome to this website
@endslot
@endcomponent
@endguest
    <!-- END Site header -->
    <!-- Main container -->
    <main>
      <!-- Recent jobs -->
      <section>
        <div class="container">
          <header class="section-header">
            <h2>Recent Quotes</h2>
          </header>

          <div class="row jobs-details">




            <!-- START JOB DETAILS -->
              <div class="col-xs-12">
              <div class="jobs-block">
                <header>
                  <a href="{/{route('jobs.show')}}"></a>
                  <div class="hgroup">
                    <h4>
            <a href="{/{route('jobs.show')}}">{/{$job->job_title}}</a>
                    </h4>
                     <div class="spacer-front"></div>
                     {/{$job->sallary}}
                  </div>

                </header>

               <footer>
              <div class="status"><strong>Posted: &nbsp;<i class="fa fa-clock-o"></i></strong>2 minutes ago &nbsp; By:&nbsp;<a href="author-jobs-details.html">James Mwirigi{/{$job->client->name}}</a></div>
                  <div class="action-btn">
                    <a class="btn btn-xs btn-info" href="category-details.html">{/{$job->job_type}}</a>
                  </div>
                </footer>
              </div>
            </div>
          <!-- END JOB DETAILS -->

          @/endforeach
          </div>

          <br><br>
    <p class="text-center">
      <ul class="pagination" role="navigation">
      <li class="page-item disabled" aria-label="&laquo; Previous">
        <span class="page-link" aria-hidden="true">&lsaquo;</span></li>
          <li class="page-item active" aria-current="page">
            <span class="page-link">1</span></li>
         <li class="page-item">
          <a class="page-link" href="#">2</a></li>
            <li class="page-item">
              <a class="page-link" href="#" rel="next" aria-label="Next &raquo;">
              </a>
            </li>
            </ul>

</p>

        </div>
      </section>
      <!-- END Recent jobs -->


@include('includes.categories')
@endsection
