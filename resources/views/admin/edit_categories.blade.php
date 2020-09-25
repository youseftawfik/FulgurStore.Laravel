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
                    ?>
                    @if ($message)
                    <p class="alert alert-success">
                        <?php
                            echo $message;
                            Session::put('message',null);
                        ?>
                    </p>
                    @endif
                <h4 class="card-title">Edit Category</h4>
                 {!!Form::open(['action' => 'CategoryController@update_category', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'])!!}
                    <fieldset>
                    <div class="form-group">
                        <label for="cname">Category name</label>
                    <input id="cname" class="form-control" name="category_name" minlength="2" type="text" required value="{{$categories->category_name}}">
                    <input id="cname" class="form-control" name="id" minlength="2" type="hidden" value="{{$categories->id}}">
                    </div>
                    <div class="form-group">
                        <label for="cname">Category Image</label>
                {{Form::file('category_image',['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label for="cname">Status</label>
                        <input id="cname" class="form-control" name="status" type="checkbox" value="1">
                    </div>
                {{Form::submit('Update Category', ['class'=>'btn btn-primary'])}}
                    </fieldset>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection