@extends('layouts.frontend')
@section('content')
<div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add Sub Category</h1>
    <br>
   <form action="{{ route('admin.edit-subcategory', $sub_data->id ) }}" method="post">
            @csrf 
    <div class="form-raw">
          <div class="form-name">Select Category</div>
          <div class="form-txtfld">
          <select name="categorie_id" class="form-control">
                  @foreach($data as $categorie)
                      <option value="{{ $categorie->id }}" @if($categorie->id==$sub_data->categorie_id) {{'selected'}} @endif>
                      {{ $categorie->categorie_name  }}
                      </option>
                  @endforeach 
            </select> 
          </div>
        </div>
          <div class="clear"></div>

        <div class="form-raw">
          <div class="form-name">Add Sub Category</div>
          <div class="form-txtfld">
            <input type="text" name="name" value="{{ $sub_data->name }}">
          </div>
        </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>    
        <div class="form-raw">
          <div class="form-name">Active</div>
          <div class="form-txtfld">
            <input type="checkbox" name="active" value="1" {{ $sub_data->active ? 'checked' : ''}}>
          </div>      
          <div class="clear"></div>
        </div>
            
        <div class="form-raw">
          <div class="form-name">&nbsp;</div>
          <div class="form-txtfld" style="width:290px;">
            <input type="submit" class="btn" value="Submit">
          </div>
        </div>
      </form>
   </div>
  
  <div class="clear">&nbsp;</div>
</div>
@endsection