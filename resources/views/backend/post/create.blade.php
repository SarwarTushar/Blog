@extends('backend.layout.master')

@section('title', 'Add Post')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3> Create Post</h3>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <form class="form-horizontal" method="POST" action ="{{route('post.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <!-- title -->
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Post Title<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        {{-- {!! Form::text('name',['class' => 'form-control']) !!} --}}
                                    <input type="text" class="form-control" name="title" placeholder="Post Title" required>
                                    </div>
                                </div>

                                <!-- Body -->
                                <div class="form-group row">
                                    <label for="body" class="col-sm-2 col-form-label">Post Body<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea class="textarea" placeholder="Place some text here" name="body"
                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                    </div>
                                </div>

                                <!-- Upload File -->
                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 col-form-label">Upload File/Image</label>
                                    <div class="col-sm-8">
                                    <input type="file" class="custom-file-upload" name="image">
                                    </div>
                                </div>

                                <!-- tag -->
                                <div class="form-group row">
                                    <label for="tag_id" class="col-sm-2 col-form-label">Select Tag<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="tag_id[]" class="form-control" required multiple>
                                            <option value="" selected>-Select Tags-</option>
                                            @foreach($tags as $model)
                                                <option value="{{$model->id}}">{{$model->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <!-- /.card-body -->
                            <div class="card-footer float-right">
                                <input type="submit" class="btn btn-success ">
                                <a  class="btn btn-danger" href="{{route('post.create')}}" role="button">Reset</a>
                                <a  class="btn btn-primary" href="{{route('/')}}" role="button">Back</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div>
            <!-- /.container-fluid -->
    </section>
</div>


@endsection
