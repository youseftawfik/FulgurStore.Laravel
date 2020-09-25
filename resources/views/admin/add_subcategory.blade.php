@extends('layout.appadmin')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                        <?php
                            $message = Session::get('message');    
                            $message1 = Session::get('message1'); 
                            $error = Session::get('error');
                        ?>
                        @if ($message)
                           <p class="alert alert-success">
                               <?php
                                    echo $message;
                                    Session::put('message',null);
                                ?>
                           </p>
                        @endif 
                        @if ($message1)
                            <p class="alert alert-danger">
                                <?php
                                    echo $message1;
                                    Session::put('message1',null);
                                ?>
                            </p> 
                        @endif
                        @if ($error)
                            <p class="alert alert-danger">
                                <?php
                                    echo $error;
                                    Session::put('error',null);
                                ?>
                            </p> 
                        @endif
                    <h4 class="card-title">Add Subcategory</h4>
                    {{-- {!!Form::open(['action' => 'SubcategoryController@save_subcategory', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'])!!} --}}
                        <fieldset>
                            <div class="form-group">
                                <label for="cname">Subcategory Name</label>
                                <input id="cname" class="form-control" name="subcategory_name" minlength="2" type="text" required>
                            </div>
                            <div class="form-group">
                                <label for="cname">Subcategory Image</label>
                        {{Form::file('subcategory_image',['class'=>'form-control'])}}
                            </div>
                            <div class="form-group">
                                <label for="cname">Category Name</label>
                                    <select id="sortingField" class="form-control" name="category_name">
                                        <option>Select Category</option>
                                            <?php
                                               $all_categories = DB::table('categories')->get();
                                            ?> 
                                            @foreach ($all_categories as $category)
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>  
                                            @endforeach    
                                        
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="cname">Status</label>
                                <input id="cname" class="form-control" name="status" type="checkbox" value="1">
                            </div>
                        {{Form::submit('Add Subcategory', ['class'=>'btn btn-primary'])}}
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection