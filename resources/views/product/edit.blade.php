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
              Update Product
              <a class="btn btn-success float-right btn-sm"  href="{{ route('product.index') }}"><i class="fa fa-list"></i> Product List</a>
            </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{ $product->product_name }}" placeholder="Enter Product Name">
                                @error('product_name')
                                    <div class="text-red-500 mr-2 text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="product_code">Product Code</label>
                                <input type="text" class="form-control  @error('product_code') is-invalid @enderror" id="product_code" name="product_code" value="{{ $product->product_code }}" placeholder="Enter Product code">
                                   @error('product_code')
                                    <div class="text-red-500 mr-2 text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="details">Product Description</label>
                               <textarea class="form-control @error('details') is-invalid @enderror" name="details" id="details" cols="30" rows="5">{{ $product->details }}</textarea>
                                @error('details')
                                    <div class="text-red-500 mr-2 text-sm">{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*">
                                    <label class="custom-file-label" for="logo">Choose file</label>
                                    @error('logo')
                                    <div class="text-red-500 mr-2 text-sm">{{ $message }}</div>
                                   @enderror
                                  </div>
                                </div>
                              </div>
                            </div>
            
                            <div>
                              <button type="submit" class="btn btn-primary">Update Product</button>
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


@endsection