@extends('layouts.master')
@section('content')


<form >
<textarea class="description" name="description"></textarea>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.description',
        width: 900,
        height: 300
    });


</script>
</form>
@endsection
