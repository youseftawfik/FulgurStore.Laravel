@extends('layout.appadmin')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Product Type</h4>
          <?php
            $increment = 1;
            $message = Session::get('message');
            $message1 = Session::get('message1');
            $message2 = Session::get('message2');
            $message3 = Session::get('message3');
          ?>
          @if ($message)
          <p class="alert alert-danger">
              <?php
                  echo $message;
                  Session::put('message',null);
              ?>
          </p>
          @endif
          @if ($message1)
          <p class="alert alert-success">
              <?php
                  echo $message1;
                  Session::put('message1',null);
              ?>
          </p>
          @endif
          @if ($message2)
          <p class="alert alert-danger">
              <?php
                  echo $message2;
                  Session::put('message2',null);
              ?>
          </p>
          @endif
          @if ($message3)
              <p class="alert alert-success">
                  <?php
                      echo $message3;
                      Session::put('message3',null);
                  ?>
              </p>
          @endif
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product_type Name</th>
                        <th>Subcategory Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($all_producttype as $producttype)
                      <tr>
                        <td>{{$increment}}</td>
                        <td><img src="/storage/images/{{$producttype->producttype_image}}" alt=""></td>
                        <td>{{$producttype->producttype_name}}</td>
                        <td>{{$producttype->subcategory_name}}</td>
                        @if ($producttype->status == 1)
                            <td>
                              <label class="badge badge-success">Activate</label>
                            </td>
                          @else
                            <td>
                              <label class="badge badge-danger">Unactivate</label>
                            </td>
                          @endif
                        <td>
                          <button class="btn btn-outline-primary"><a href="{{URL::to('/edit_producttype/'.$producttype->id)}}">Update</a></button>
                          <button class="btn btn-outline-danger"><a href="{{URL::to('/delete_producttype/'.$producttype->id)}}" id="delete">Delete</a></button>
                          @if ($producttype->status == 1)
                          <button class="btn btn-outline-warning"><a href="{{URL::to('/unactivate_producttype/'.$producttype->id)}}">Unactivate</a></button> 
                          @else
                          <button class="btn btn-outline-success"><a href="{{URL::to('/activate_producttype/'.$producttype->id)}}">Activate</a></button>
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