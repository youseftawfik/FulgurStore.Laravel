@extends('layout.appadmin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Products</h4>
            <?php
              $increment = 1;
              $all_products = DB::table('tbl_products')->get();
            ?>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Product price</th>
                        <th>Product category</th>
                        <th>Product image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($all_products as $product)
                      <tr>
                          <td>{{$increment}}</td>
                          <td>{{$product->product_name}}</td>
                          <td>{{$product->product_price}}</td>
                          <td>{{$product->product_category}}</td>
                          <td><img src="/storage/products/{{$product->product_image}}" alt=""></td>
                          @if ($product->status == 1)
                            <td>
                              <label class="badge badge-success">Activate</label>
                            </td>  
                          @else
                            <td>
                              <label class="badge badge-danger">Unactivate</label>
                            </td>
                          @endif  
                            <td>
                              <button class="btn btn-outline-primary">Update</button>
                              <button class="btn btn-outline-danger">Delete</button>
                              @if ($product->status == 1)
                                <label class="btn btn-outline-warning">Unactivate</label>
                              @else
                                  <label class="btn btn-outline-success">Activate</label>
                              @endif  
                            </td>
                      </tr>
                      <?php
                        $increment = $increment +1;
                      ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection