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
                <h4 class="card-title">Edit Product Type</h4>
                {!! Form::open(['action'=>'ProducttypeController@update_producttype', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                    <fieldset>
                    <div class="form-group">
                        <label for="cname">Product Type Name</label>
                        <input id="cname" class="form-control" name="producttype_name" minlength="2" type="text" value="{{$all_producttype->producttype_name}}" required>
                        <input id="cname" class="form-control" name="id" minlength="2" type="hidden" value="{{$all_producttype->id}}" required>
                    </div>
                    <div class="form-group">
                        <label for="cname"> Subcategory Name</label>
                            <select id="sortingField" class="form-control" name="subcategory_name">
                                <option>Select Subcategory</option>
                                    <?php
                                       $all_subcategories = DB::table('sub_category')->get();
                                    ?> 
                                    @foreach ($all_subcategories as $subcategory)
                                        <option value="{{$subcategory->subcategory_name}}">{{$subcategory->subcategory_name}}</option>  
                                    @endforeach    
                                
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="cname">Image</label>
                {{Form::file('producttype_image', ['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label for="cname">Status</label>
                        <input id="cname" class="form-control" name="status" type="checkbox" value="1">
                    </div>
                {{Form::submit('Update Product Type', ['class'=>'btn btn-primary'])}}
                    </fieldset>
                {{Form::close()}}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection