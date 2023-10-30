@extends('layouts.frontend')
@section('content')
<div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add Category</h1>
    <br>
  <form action="{{ route('admin.update-category', $data->id ) }}" method="post">
        @csrf 
    <div class="form-raw">
      <div class="form-name">Category Name</div>
      <div class="form-txtfld">
        <input type="text" name="categorie_name" value="{{ $data->categorie_name }}">
      </div>
    </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>    
    <div class="form-raw">
      <div class="form-name">Active</div>
      <div class="form-txtfld">
        <input type="checkbox" name="active" value="1" {{ $data->active ? 'checked' : ''}}>
      </div>      
      <div class="clear"></div>
    </div>
        
    <div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld" style="width:290px;">
        <input type="submit" class="btn" value="Submit">
      </div>
    </div>
  </div>
</form>
  <div class="clear">&nbsp;</div>
</div>
@endsection