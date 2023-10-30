@extends('layouts.frontend')
@section('content')
  <div id="wrap" >
  <section class="bodymain" style="min-height:580px;">
    <aside class="middle-container">
      <div class="admin-inr"><br>
		<div class="form-outer" style="margin-left:320px; width:500px;">
		          <h1>Change Password</h1>
			<form action="{{ route('change_password') }}" method="post">
			@csrf
		          <div class="contact-row">
		            <div class="name">Current Password</div>
		            <div class="txtfld-box">
		              <input type="password"name="current_password">
					  @if($errors->any())
						<h4>{{$errors->first()}}</h4>
					  @endif
		            </div>
		            
		          </div>
		          <div class="clear"></div>
		          <div class="contact-row">
		            <div class="name">New Password</div>
		            <div class="txtfld-box">
		              <input type="text" name="new_password">
		            </div>
		          </div>
		          <div class="clear"></div>
		          <div class="contact-row">
		            <div class="name">Confirm Password</div>
		            <div class="txtfld-box">
		              <input type="password" name="new_password_confirmation">
		            </div>
		          </div>
		          <div class="clear">&nbsp;</div>
		          <div class="contact-row">
		            <div class="name" style="float:right; width:1px;">&nbsp;</div>
		            <div style="background:none; border:none; float:left;">
		              <input type="submit" class="btn" value="Change Password">
		              <br>
		            </div>
		          </div>
		        </div>
			<form>
		        <div class="clear">&nbsp;</div>
		        
        <div class="clear"></div>
      </div>
    </aside>
    <div class="clear"></div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </section>
</div>
<div class="clear"></div>
@endsection