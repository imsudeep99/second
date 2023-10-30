@extends('layouts.frontend')
@section('content')
<div id="wrap">
    <div class="clear" style="height:5px;"></div>
    <div id="wrap2">
        <h1>Add Product</h1>
        <br>
        <form action="{{ route('admin.prodict-edit' ,$data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-raw">
                <div class="form-name">Select Category</div>
                <div class="form-txtfld">
                    <select name="categorie_id">
                        @foreach($cat_data as $categorie)
                        <option value="{{ $categorie->id  }}" @if($categorie->id==$data->categorie_id) {{'selected'}} @endif>
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
                        @foreach($sub_catdata as $sub_categorie)
                        <option value="{{ $sub_categorie->id  }}">
                            {{ $sub_categorie->name  }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="clear"></div>



            <div class="form-raw">
                <div class="form-name">Product Name</div>
                <div class="form-txtfld">
                    <input type="text" name="name" value="{{ $data->name }}">
                </div>
            </div>

            <div class="form-name">Product Image1</div>
            <div class="form-txtfld">
                <input type="file" name="image" value="{{ $data->image }}">
                <div class="form-name"> Image Size ( Width=560px, Height=390px ) (Product page)</div>
                <div class="img">
                    <img src="{{ asset('storage/'.$data->image) }}" alt="" width="150" height="150" />
                </div>
            </div>
    </div>
    <div class="form-raw" style="width:100%;">
        <div class="form-name">Short Description</div>
        <div class="form-txtfld">
            <textarea name="short_description">{{ $data->short_description }}</textarea>
        </div>
    </div>

    <div class="clear"></div>
    <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Description</h1>
    <br>

    @foreach($description_data as $key => $description)
    <div class="form-raw">
        <div class="form-name"> &nbsp;</div>
        <div class="form-txtfld">
            <input type="text" name="desc[{{$key}}][title]" value="{{ $description->title }}" placeholder="Title">
        </div>
    </div>
    <div class="form-raw">
        <div class="form-name">&nbsp;</div>
        <div class="form-txtfld txtfld50">
            <input type="text" name="desc[{{$key}}][heading]" value="{{ $description->heading }}" placeholder="heading">
        </div>
        <div class="form-txtfld txtfld50"><input type="text" value="{{ $description->description }}" name="desc[{{$key}}][description]" placeholder="desciption"></div>
        <a href="#"><img src="/assets/images/delete.gif" alt=""></a>
    </div>
    @endforeach

    <!--div class="form-raw">
        <div class="form-name">&nbsp;</div>
        <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="#">Add More +</a></div>
    </!--div>

    </!--div class="form-raw">
        <div class="form-name"> &nbsp;</div>
        <div class="form-txtfld">
            <input type="text" name="desc[1][title]" placeholder="Title">
        </div> 
    </>
    <div class="form-raw">
        <div class="form-name">&nbsp;</div>
        <div class="form-txtfld txtfld50"><input type="text" name="desc[1][heading]" placeholder="heading"></div>
        <div class="form-txtfld txtfld50"><input type="text" name="desc[1][desciption]" placeholder="desciption"></div>
        <a href="#"><img src="images/delete.gif" alt=""></a>
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
        <div class="form-txtfld txtfld50"><input type="text" name="desc[2][desciption]" placeholder="desciption"></div>
        <a href="#"><img src="/assets/images/delete.gif" alt=""></a>
    </div>
    <div-- class="form-raw">
        <div class="form-name">&nbsp;</div>
        <div class="form-txtfld" style="width: 320px; text-align: right;"><a href="#">Add More +</a></div>
    </div-->

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
            <textarea style="width:100%; height:500px;" name="description">{{ $data->description }}</textarea>
        </div>
    </div>
    <div class="clear"></div>
    <h1 style="border-bottom: 1px solid #CCC; padding-bottom: 10px; margin: 20px 0 0px 0;">Upload PDF</h1>
    <br>
    @if($product_pdf->count())
    @foreach($product_pdf as $key => $product_pdf)
    <div class="form-raw">
        <div class="form-name">&nbsp;</div>
        <div class="form-txtfld txtfld50"><input type="text" name="pdf[{{ $key }}][heading]" value="{{ $product_pdf->heading }}" placeholder="PDF heading"></div>
        <div class="form-txtfld txtfld50"><input type="file" name="pdf[{{ $key }}][file]" value="{{ $product_pdf->file }}" placeholder="desciption"></div>
        <div class="img">
            <img src="{{ asset('storage/'.$product_pdf->file) }}" alt="" width="150" height="150" />
        </div>
    </div>
    @endforeach
    @else
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
    @endif
    <div class="clear"></div>
    <div class="form-raw">
        <div class="form-name">Active</div>
        <div class="form-txtfld">
            <input type="checkbox" name="active" value="{{ $data->active }}" {{ $data->active ? 'checked' : ''}}>
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
@endsection