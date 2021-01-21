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
              All Product
              <a class="btn btn-success float-right btn-sm"  href="{{ route('product.create') }}"><i class="fa fa-plus"></i> Add Product</a>
            </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL No</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Description</th>
                  <th>Logo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($products as $key => $product)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_code }}</td>
                    <td>{{ $product->details }}</td>
                    <td>
                      <img src="{{ asset('public/uploads/logo/'.$product->logo) }}" alt="logo" style="max-width: 60px">
                    </td>
                    <td>
                      <a href="{{ route('product.edit',$product->id) }}" class="btn btn-info">Edit</a>
                      <form action="{{  route('product.destroy',$product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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