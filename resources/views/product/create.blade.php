@extends('admin.admin_layouts')

@section('admin_content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Product</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Product</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3>
              Add Product
              <a class="btn btn-success float-right btn-sm"  href="{{ route('product.index') }}"><i class="fa fa-list"></i> Product List</a>
            </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ old('product_name') }}" placeholder="Enter Product Name">
                                @error('product_name')
                                    <div class="text-red-500 mr-2 text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="product_code">Product Code</label>
                                <input type="text" class="form-control  @error('product_code') is-invalid @enderror" id="product_code" name="product_code" value="{{ old('product_code') }}" placeholder="Enter Product code">
                                   @error('product_code')
                                    <div class="text-red-500 mr-2 text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="details">Product Description</label>
                               <textarea class="form-control @error('details') is-invalid @enderror" name="details" id="details" cols="30" rows="5">{{ old('product_code') }}</textarea>
                                @error('details')
                                    <div class="text-red-500 mr-2 text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="@error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*" onchange="previewFile(this);">
                                    <img src="" id="previewImg" style="max-width: 130px; margin-top: 20px">

                                    @error('logo')
                                    <div class="text-red-500 mr-2 text-sm">{{ $message }}</div>
                                   @enderror
                              </div>
                            </div>
            
                            <div>
                              <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->



 <script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>


@endsection