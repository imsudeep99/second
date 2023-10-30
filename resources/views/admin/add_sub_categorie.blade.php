@extends('layouts.frontend')
@section('content')
  <div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add Sub Category</h1>
    <br>
<form action="{{ route('admin.add_store_sub') }}" method="post">
        @csrf 
<div class="form-raw">
      <div class="form-name">Select Category</div>
      <div class="form-txtfld">
      <select name="categorie_id" class="form-control">
                        
              @foreach($data as $categorie)
                  <option value="{{ $categorie->id  }}">
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
        <input type="text" name="name" required autocomplete="name">
      </div>
    </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>    
    <div class="form-raw">
      <div class="form-name">Active</div>
      <div class="form-txtfld">
        <input type="checkbox" name="active" value="1">
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
<div id="wrap3">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="admintable">
    <tr>
      <th width="59" align="left" valign="middle">Sr.No.</th>
      <th width="752" align="left" valign="middle">Category Name</th>
       <th width="752" align="left" valign="middle">Sub Category Name</th>
      <th width="77" align="left" valign="middle">Status</th>
      <th width="54" align="left" valign="middle">Edit</th>
      <th width="71" align="left" valign="middle">Remove</th>
    </tr>
    @foreach($sub_data as $sub_categorie)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $sub_categorie->categorie_name }}</td>
      <td>{{ $sub_categorie->name }}</td>
      <td>{{ $sub_categorie->active ? 'Active': 'Inactive' }}</td> 
      <td align="left" valign="top"><a href="{{ route('admin.edit-pagesub_category',$sub_categorie->id) }}">Edit</a></td>
      <td align="center" valign="top"><a href="{{ route('admin.destory_sub-cat',$sub_categorie->id) }}"><img src="/assets/images/icon-bin.jpg" alt="" width="25" height="25" border="0" align="absmiddle" /></a></td>
    </tr>
    @endforeach
  </table>
  <div class="clear">&nbsp;</div>
</div>
<div class="clear"></div>
@endsection