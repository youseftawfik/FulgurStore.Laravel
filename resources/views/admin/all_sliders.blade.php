@extends('layout.appadmin')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sliders</h4>
            <?php
              $increment = 1;
              $all_sliders = DB::table('tbl_slider')->get();
            ?>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Description1 One</th>
                        <th>Description Two</th>
                        <th>Slider image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($all_sliders as $slider)
                      <tr>
                        <td>{{$increment}}</td>
                        <td>{{$slider->description1}}</td>
                        <td>{{$slider->description2}}</td>
                        <td><img src="/storage/products/{{$slider->slider_image}}" alt=""></td>
                        @if ($slider->status == 1)
                          <td>
                            <label class="badge badge-success">Activate</label>
                          </td> 
                        @else
                          <td>
                            <button class="badge badge-danger">Unactivate</button>
                          </td> 
                        @endif
                          <td>
                            <button class="btn btn-outline-primary">Update</button>
                            <button class="btn btn-outline-danger">Delete</button>
                            @if ($slider->status == 1)
                              <button class="btn btn-outline-warning">Unactivate</button>
                            @else
                              <button class="btn btn-outline-success">Activate</button>
                            @endif
                          </td> 
                      </tr>
                        <?php
                          $increment = $increment + 1;
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