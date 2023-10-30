@extends('layouts.frontend')
@section('content')
<div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add Category</h1>
    <br>
  <form action="{{ route('admin.store_category') }}" method="post">
        @csrf 
    <div class="form-raw">
      <div class="form-name">Category Name</div>
      <div class="form-txtfld">
        <input type="text" name="categorie_name"  required autocomplete="categorie_name"></div>
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
      <th width="77" align="left" valign="middle">Status</th>
      <th width="54" align="left" valign="middle">Edit</th>
      <th width="71" align="left" valign="middle">Remove</th>
    </tr>
    @foreach($data as $categories)
    <tr>
    <td>{{ $loop->iteration}}</td>
    <td>{{ $categories->categorie_name }}</td>
    <td>{{ $categories->active ? 'Active': 'Inactive' }}</td>
      <td align="left" valign="top"><a href="{{ route('admin.update-page_category',$categories->id) }}">Edit</a></td>
      <td align="center" valign="top"><a href="{{ route('admin.delete_category',$categories->id) }}"><img src="/assets/images/icon-bin.jpg" alt="" width="25" height="25" border="0" align="absmiddle" /></a></td>
    </tr>
  @endforeach
  </table>
  <div class="clear">&nbsp;</div>
</div>
<div class="clear"></div>
@endsection