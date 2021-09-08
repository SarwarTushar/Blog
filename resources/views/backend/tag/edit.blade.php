@extends('backend.layout.master')

@section('title', 'Edit Tag')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3> Edit Tag</h3>
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
                        <form class="form-horizontal" method="POST" action ="{{route('tag.update',$tag->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Tag Name<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{$tag->name}}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer float-right">
                                <input type="submit" value="Update" class="btn btn-success ">
                                <a  class="btn btn-danger" href="{{route('tag.create')}}" role="button">Reset</a>
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
