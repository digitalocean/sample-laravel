@extends('layout/mdb-form')

@section('title', 'Início')

@section('content')

    <div class="view full-page-intro"
        style="background-image: url('https://www.culturaprojetada.com.br/wp-content/uploads/2019/06/road-3186188_1920-980x400.jpg'); background-repeat: no-repeat; background-size: cover;">

        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <div class="container">

                <div class="row wow fadeIn">

                    <div class="col-md-6 mb-4 white-text text-center text-md-left">

                        <h1 class="display-4 font-weight-bold">GasWay</h1>

                        <hr class="hr-light">

                        <!--p>
                            <strong>Aplicativo</strong>
                        </p-->

                        <!--p class="mb-4 d-none d-md-block">
                            <strong>{ { __('messages.welcome') }}</strong>
                        </p-->

                        <!--a href="/register" class="btn btn-indigo btn-lg">Experimente grátis
                            <i class="fas fa-graduation-cap ml-2"></i>
                        </a-->

                    </div>

                    <div class="col-md-6 col-xl-5 mb-4">

                        <div class="card">

                            <div class="card-body">

                                <form method="POST" action="<?php/*{ { route('login') } }*/?>" autocomplete="off">
                                    
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                    <h3 class="dark-grey-text text-center">
                                        <strong>Acesso</strong>
                                    </h3>
                                    <hr>

                                    <div class="md-form">
                                        <i class="fas fa-envelope prefix grey-text"></i>
                                        <!--input type="email" id="email" name="usuario2" class="form-control"
                                            autocomplete="off" autocomplete="email"-->
                                        <label for="email">Email</label>

                                        <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="off" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                                        
                                    </div>
                                    <div class="md-form">
                                        <i class="fas fa-lock prefix grey-text"></i>

                                        <!--input type="password" id="senha" name="senha" class="form-control"
                                            autocomplete="new-password" autocomplete="current-password" -->
                                        <label for="senha">Senha</label>
                                        <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required 
                                                autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <!--div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" { { old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    { { __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div-->                                    

                                    <!--div class="md-form">
                                        <i class="fas fa-pencil-alt prefix grey-text"></i>
                                        <textarea type="text" id="form8" class="md-textarea"></textarea>
                                        <label for="form8">Your message</label>
                                    </div-->
                                    <div class="text-center">
                                        <!--a href="admin" class="btn btn-indigo btn-login">Entrar</a-->
                                        <button type="submit" class="btn btn-indigo">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif

                                    </div>

                                    <!--div class="text-center">
                                        <button class="btn btn-indigo btn-login">Entrar</button>
                                        <hr>
                                        <fieldset class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox1">
                                            <label for="checkbox1" class="form-check-label dark-grey-text">Subscribe me to
                                                the newsletter</label>
                                        </fieldset-->
                            </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    </div>

    <!--
    <main>
        <div class="container">

            <section class="mt-5 wow fadeIn">

                <div class="row">

                    <div class="col-md-6 mb-4">

                        <img src="https://mdbootstrap.com/img/Marketing/mdb-press-pack/mdb-main.jpg"
                            class="img-fluid z-depth-1-half" alt="">

                    </div>

                    <div class="col-md-6 mb-4">

                        <h3 class="h3 mb-3">Material Design for Bootstrap</h3>
                        <p>This template is created with Material Design for Bootstrap (
                            <strong>GasWay</strong> ) framework.
                        </p>
                        <p>Read details below to learn more about GasWay.</p>

                        <hr>

                        <p>
                            <strong>400+</strong> material UI elements,
                            <strong>600+</strong> material icons,
                            <strong>74</strong> CSS animations, SASS files, templates, tutorials and many more.
                            <strong>Free for personal and commercial use.</strong>
                        </p>

                        <a  href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
                            class="btn btn-indigo btn-md">Download
                            <i class="fas fa-download ml-1"></i>
                        </a>
                        <a  href="https://mdbootstrap.com/docs/jquery/components/"
                            class="btn btn-indigo btn-md">Live demo
                            <i class="far fa-image ml-1"></i>
                        </a>

                    </div>

                </div>

            </section>

            <hr class="my-5">

            <section>

                <h3 class="h3 text-center mb-5">About GasWay</h3>

                <div class="row wow fadeIn">

                    <div class="col-lg-6 col-md-12 px-4">

                        <div class="row">
                            <div class="col-1 mr-3">
                                <i class="fas fa-code fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="feature-title">Bootstrap 4</h5>
                                <p class="grey-text">Thanks to GasWay you can take advantage of all feature of newest Bootstrap
                                    4.</p>
                            </div>
                        </div>

                        <div style="height:30px"></div>

                        <div class="row">
                            <div class="col-1 mr-3">
                                <i class="fas fa-book fa-2x blue-text"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="feature-title">Detailed documentation</h5>
                                <p class="grey-text">We give you detailed user-friendly documentation at your disposal. It
                                    will help you to implement your ideas
                                    easily.
                                </p>
                            </div>
                        </div>

                        <div style="height:30px"></div>

                        <div class="row">
                            <div class="col-1 mr-3">
                                <i class="fas fa-graduation-cap fa-2x cyan-text"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="feature-title">Lots of tutorials</h5>
                                <p class="grey-text">We care about the development of our users. We have prepared numerous
                                    tutorials, which allow you to learn
                                    how to use GasWay as well as other technologies.</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-12">

                        <p class="h5 text-center mb-4">Watch our "5 min Quick Start" tutorial</p>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cXTThxoywNQ"
                                allowfullscreen></iframe>
                        </div>
                    </div>

                </div>

            </section>

            <hr class="my-5">

            <section>

                <h2 class="my-5 h3 text-center">Not enough?</h2>

                <div class="row features-small mb-5 mt-3 wow fadeIn">

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-check-circle fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="feature-title">Free for personal and commercial use</h6>
                                <p class="grey-text">Our license is user-friendly. Feel free to use GasWay for both private as
                                    well as commercial projects.
                                </p>
                                <div style="height:15px"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-check-circle fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="feature-title">400+ UI elements</h6>
                                <p class="grey-text">An impressive collection of flexible components allows you to develop
                                    any project.
                                </p>
                                <div style="height:15px"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-check-circle fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="feature-title">600+ icons</h6>
                                <p class="grey-text">Hundreds of useful, scalable, vector icons at your disposal.</p>
                                <div style="height:15px"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-check-circle fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="feature-title">Fully responsive</h6>
                                <p class="grey-text">It doesn't matter whether your project will be displayed on desktop,
                                    laptop, tablet or mobile phone. GasWay
                                    looks great on each screen.</p>
                                <div style="height:15px"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 flex-center">
                        <img src="https://mdbootstrap.com/img/Others/screens.png"
                            alt="GasWay Magazine Template displayed on iPhone" class="z-depth-0 img-fluid">
                    </div>

                    <div class="col-md-4 mt-2">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-check-circle fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="feature-title">70+ CSS animations</h6>
                                <p class="grey-text">Neat and easy to use animations, which will increase the interactivity
                                    of your project and delight your visitors.
                                </p>
                                <div style="height:15px"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-check-circle fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="feature-title">Plenty of useful templates</h6>
                                <p class="grey-text">Need inspiration? Use one of our predefined templates for free.</p>
                                <div style="height:15px"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-check-circle fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="feature-title">Easy installation</h6>
                                <p class="grey-text">5 minutes, a few clicks and... done. You will be surprised at how easy
                                    it is.
                                </p>
                                <div style="height:15px"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-check-circle fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h6 class="feature-title">Easy to use and customize</h6>
                                <p class="grey-text">Using GasWay is straightforward and pleasant. Components flexibility
                                    allows you deep customization. You will
                                    easily adjust each component to suit your needs.</p>
                                <div style="height:15px"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>

            <hr class="mb-5">

            <section>

                <h2 class="my-5 h3 text-center">...and even more</h2>

                <div class="row features-small mt-5 wow fadeIn">

                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fab fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2 pl-3">
                                <h5 class="feature-title font-bold mb-1">Cross-browser compatibility</h5>
                                <p class="grey-text mt-2">Chrome, Firefox, IE, Safari, Opera, Microsoft Edge - GasWay loves all
                                    browsers; all browsers love GasWay.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-level-up-alt fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">Frequent updates</h5>
                                <p class="grey-text mt-2">GasWay becomes better every month. We love the project and enhance as
                                    much as possible.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-comments fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">Active community</h5>
                                <p class="grey-text mt-2">Our society grows day by day. Visit our forum and check how it is
                                    to be a part of our family.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">jQuery 3.x</h5>
                                <p class="grey-text mt-2">GasWay is integrated with newest jQuery. Therefore you can use all
                                    the latest features which come along with
                                    it.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row features-small mt-4 wow fadeIn">

                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-cubes fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">Modularity</h5>
                                <p class="grey-text mt-2">Material Design for Bootstrap comes with both, compiled, ready to
                                    use libraries including all features as
                                    well as modules for CSS (SASS files) and JS.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-question fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">Technical support</h5>
                                <p class="grey-text mt-2">We care about reliability. If you have any questions - do not
                                    hesitate to contact us.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="fas fa-th fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">Flexbox</h5>
                                <p class="grey-text mt-2">GasWay fully supports Flex Box. You can forget about alignment
                                    issues.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-6">
                        <div class="row">
                            <div class="col-2">
                                <i class="far fa-file-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                            </div>
                            <div class="col-10 mb-2">
                                <h5 class="feature-title font-bold mb-1">SASS files</h5>
                                <p class="grey-text mt-2">Arranged and well documented .scss files can't wait until you
                                    compile them.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </section>

        </div>
    </main>
    -->

    <script>
        $(document).ready(function() {
            $("#email").focus()
        })

    </script>

@endsection
