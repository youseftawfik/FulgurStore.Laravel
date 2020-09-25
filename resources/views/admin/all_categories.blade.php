@extends('layout.appadmin')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Categories</h4>
          <?php
            $increment = 1;
            $all_categories = DB::table('categories')->get();
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
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($all_categories as $category)
                      <tr>
                        <td>{{$increment}}</td>
                        <td><img src="/storage/images/{{$category->category_image}}" alt=""></td>
                        <td>{{$category->category_name}}</td>
                        <td>
                          @if ($category->status == 1)
                            <label class="badge badge-success">Active</label> 
                          @else
                            <label class="badge badge-danger">Unactive</label>
                          @endif
                        </td>
                        <td>
                          <button class="btn btn-outline-primary"><a href="{{URL::to('/edit_category/'.$category->id)}}">Update</a></button>
                          <button class="btn btn-outline-danger"><a href="{{URL::to('/delete_category/'.$category->id)}}" id="delete">Delete</a></button>
                          @if ($category->status == 1)
                        <button class="btn btn-outline-warning"><a href="{{URL::to('/unactivate_category/'.$category->id)}}">Unactivate</a></button>
                          @else
                          <button class="btn btn-outline-success"><a href="{{URL::to('/activate_category/'.$category->id)}}">Activate</a></button>
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

{{-- foreach ($photo as $photo)
        {
            $photo->photo = asset($photo->photo);
        } --}}