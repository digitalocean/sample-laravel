
<!-- ============== ERRORS --->
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<!-- ===============End ERRORS ======================== -->
<!-- ----------------SESSION ----------------------------->
@if(session()->get('message'))
    <div class="alert alert-success" role="alert">
        <strong>SUCCESS:</strong>{{ session()->get('message')}}
    </div>
@endif
<!--------------------End SESSION --------------------->

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}

        </div>
    @endforeach
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
