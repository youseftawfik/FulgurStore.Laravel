@extends('layout.appadmin')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php
                        $error = Session::get('error');    
                    ?>
                    @if ($error)
                    <p class="alert alert-danger">
                      <?php
                        echo $error;
                        Session::put('error',null);
                      ?>
                    </p>
                @endif
                    <h4 class="card-title">Edit Subcategory</h4>
                    {!!Form::open(['action' => 'SubcategoryController@update_subcategory', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'])!!}
                        <fieldset>
                            <div class="form-group">
                                <label for="cname">Subcategory Name</label>
                            <input id="cname" class="form-control" name="subcategory_name" minlength="2" type="text" required value="{{$all_subcategory->subcategory_name}}">
                            <input id="cname" class="form-control" name="id" minlength="2" type="hidden" value="{{$all_subcategory->id}}">

                            </div>
                            <div class="form-group">
                                <label for="cname">Subcategory Image</label>
                        {{Form::file('subcategory_image',['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">
                                <label for="cname">Category Name</label>
                                    <select id="sortingField" class="form-control" name="cat_name">
                                            <?php
                                               $all_categories = DB::table('categories')->where('category_name', '!=' ,$all_subcategory->category_name)->get();
                                            ?>  
                                            <option value="{{$all_subcategory->category_name}}">{{$all_subcategory->category_name}}</option>  
                                            @foreach ($all_categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>  
                                            @endforeach
  
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="cname">Status</label>
                                <input id="cname" class="form-control" name="status" type="checkbox" value="1">
                            </div>
                        {{Form::submit('Update Subcategory', ['class'=>'btn btn-primary'])}}
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection