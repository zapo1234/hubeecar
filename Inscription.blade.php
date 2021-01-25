@extends('layouts.app')

@section('title','inscription user')
@section('content')
<div class="container">

@if (session('status'))
<div class="alert alert-success" role="alert">
	{{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
{{ session('failed') }}
</div>
@endif

<form method="POST" action="{{ route('create') }}">
@csrf
  <div class="form-group">
    <label for="formGroupExampleInput">nom</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="nom" placeholder="" required>
  @if($errors->has('nom'))
  <div class="error">{{$errors->first('nom') }}</div>
  @endif
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">adresse</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="adresse" placeholder="" required>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Age</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="age" placeholder="" required>
   
    @if($errors->has('age'))
  <div class="error">{{$errors->first('age') }}</div>
  @endif

  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">pays</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="pays" placeholder="
    ">
  </div>
  <button type="submit" class="btn btn-primary"> {{ __('enregister') }}</button>
</form>
                                

</div>
@endsection


