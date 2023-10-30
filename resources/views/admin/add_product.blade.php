@extends('layouts.frontend')
@section('content')
<div id="wrap">
  <div class="clear" style="height:5px;"></div>
  <div id="wrap2">
    <h1>Add Product</h1>
    <br>
    <form action="{{ route('admin.post_product') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-raw">
        <div class="form-name">Select Category</div>
        <div class="form-txtfld">
          <select name="category_id">
            @foreach($cat_data as $categorie)
            <option value="{{ $categorie->id  }}">
              {{ $categorie->categorie_name  }}
            </option>

            @endforeach
          </select>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-raw">
        <div class="form-name">Select Sub Category</div>
        <div class="form-txtfld">
          <select multiple="select" style="height: 100px;" name="sub_category">
            @foreach($subcat_data as $sub_categorie)
            <option value="{{ $sub_categorie->id  }}">
              {{ $sub_categorie->name }}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="clear"></div>



      <div class="form-raw">
        <div class="form-name">Product Name</div>
        <div class="form-txtfld">
          <input type="text" name="name">
        </div>
      </div>

      <div class="form-name">Product Image1</div>
      <div class="form-txtfld">
        <input type="file" name="image">
        <div class="form-name"> Image Size ( Width=560px, Height=390px ) (Product page)</div>
      </div>
  </div>
  <div class="form-raw" style="width:100%;">
    <div class="form-name">Short Description</div>
    <div class="form-txtfld">
      <textarea name="short_description"></textarea>
    </div>
  </div>

  <div class="clear"></div>
  <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Description</h1>
  <br>
  <div class="form-raw">
    <div class="form-name"> &nbsp;</div>
    <div class="form-txtfld">
      <input type="text" name="desc[0][title]" placeholder="Title">
    </div>
  </div>

  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld txtfld50"><input type="text" name="desc[0][heading]" placeholder="heading"></div>
    <div class="form-txtfld txtfld50"><input type="text" name="desc[0][description]" placeholder="desciption"></div>
    <a href="#"><img src="images/delete.gif" alt=""></a>
  </div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="#">Add More +</a></div>
  </div>



  <div class="form-raw">
    <div class="form-name"> &nbsp;</div>
    <div class="form-txtfld">
      <input type="text" name="desc[1][title]" placeholder="Title">
    </div>
  </div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld txtfld50"><input type="text" name="desc[1][heading]" placeholder="heading"></div>
    <div class="form-txtfld txtfld50"><input type="text" name="desc[1][description]" placeholder="desciption"></div> <a href="#"><img src="images/delete.gif" alt=""></a>
  </div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="#">Add More +</a></div>
  </div>



  <div class="form-raw">
    <div class="form-name"> &nbsp;</div>
    <div class="form-txtfld">
      <input type="text" name="desc[2][title]" placeholder="Title">
    </div>
  </div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld txtfld50"><input type="text" name="desc[2][heading]" placeholder="heading"></div>
    <div class="form-txtfld txtfld50"><input type="text" name="desc[2][description]" placeholder="desciption"></div>
    <a href="#"><img src="/assets/images/delete.gif" alt=""></a>
  </div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="#">Add More +</a></div>
  </div>

  <!--  <div class="form-raw">
      <div class="form-name">&nbsp;</div>
      <div class="form-txtfld txtfld50"><input type="text" placeholder="heading"></div>
      <div class="form-txtfld txtfld50"><input type="text" placeholder="desciption"></div>
      <a href="#"><img src="images/delete.gif" alt=""></a>      
  </div> -->







  <div class="clear"></div>
  <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Features</h1>
  <br>
  <div class="form-raw" style="width:100%;">
    <div class="form-name">Content</div>
    <div class="form-txtfld" style="width:780px;">
      <textarea style="width:100%; height:500px;" name="description">CK</textarea>
    </div>
  </div>
  <div class="clear"></div>
  <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Upload PDF</h1>
  <br>

  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld txtfld50"><input type="text" name="pdf[0][heading]" placeholder="PDF heading"></div>
    <div class="form-txtfld txtfld50"><input type="file" name="pdf[0][file]" placeholder="desciption"></div>
  </div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="#">Add More +</a></div>
  </div>

  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld txtfld50"><input type="text" name="pdf[1][heading]" placeholder="PDF heading"></div>
    <div class="form-txtfld txtfld50"><input type="file" name="pdf[1][file]" placeholder="desciption"></div>
  </div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="#">Add More +</a></div>
  </div>

  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld txtfld50"><input type="text" name="pdf[2][heading]" placeholder="PDF heading"></div>
    <div class="form-txtfld txtfld50"><input type="file" name="pdf[2][file]" placeholder="desciption"></div>
    <a href="#"><img src="/assets/images/delete.gif" alt=""></a>
  </div>




  <!-- <div class="form-raw">
      <div class="form-name">Heading</div>
      <div class="form-txtfld">
        <input type="text">
      </div>
    </div> 
     <div class="form-raw">
      <div class="form-name">PDF</div>
      <div class="form-txtfld">
        <input type="file">
      </div>
    </div> -->



  <div class="clear"></div>
  <div class="form-raw">
    <div class="form-name">Active</div>
    <div class="form-txtfld">
      <input type="checkbox" name="active" value="1">
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="form-raw">
    <div class="form-name">&nbsp;</div>
    <div class="form-txtfld">
      <input type="submit" class="btn" value="Submit">
    </div>
  </div>
</div>
</form>
<div class="clear">&nbsp;</div>
</div>
<div id="wrap2">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="admintable">
    <tr>
      <th width="53" align="left" valign="middle">Sr.No.</th>
      <th width="153" align="left" valign="middle">Select Category</th>
      <th width="71" align="left" valign="middle"> Select Sub Category</th>
      <th width="71" align="left" valign="middle"> Product Name</th>

      <th width="408" align="left" valign="middle">Short Description</th>
      <th width=" " align="left" valign="middle">Full Description</th>
      <th width="49" align="left" valign="middle">Status</th>

      <th width="49" align="left" valign="middle">Edit</th>
      <th width="61" align="left" valign="middle">Remove</th>
    </tr>
    @foreach($data as $products)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $products->categorie_name }}</td>
      <td>{{ $products->sub_categorie_name }}</td>
      <td>{{ $products->name }}</td>
      <td>{{ $products->short_description }}</td>
      <td>{{ $products->description }}</td>
      <td>{{ $products->active ? 'Active': 'Inactive' }}</td>



      <td align="left" valign="top"><a href="{{ route('admin.product_editpage',$products->id) }}">Edit</a></td>
      <td align="center" valign="top"><a href="{{ route('admin.pro_delete',$products->id) }}"><img src="/assets/images/icon-bin.jpg" alt="" width="25" height="25" border="0" align="absmiddle" /></a></td>
    </tr>
    @endforeach
  </table>
  <div class="clear">&nbsp;</div>
</div>
<div class="clear"></div>
@endsection