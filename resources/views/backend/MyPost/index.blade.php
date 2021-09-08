@extends('backend.layout.master')

@section('title', 'My Posts')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Posts</h1>
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
                        <div class="card-header" style="text-align:right;">
                            <a  class="btn btn-primary" href="{{route('post.create')}}" role="button">Create New Post</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="text-align: left">
                          <div class="col-12">
                            <?php
                              $i=1;
                            ?>
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th  width="2%">Serial No.</th>
                                <th>Title Name</th>
                                <th>Body</th>
                                <th>Created At</th>
                                <th>Action</th>
                              </tr>
                              </thead>
                              @foreach($myPosts as $key=> $model)
                              <tr>
                                <td>{{$i++}}</td>
                                <td>{{$model->title}}</td>
                                <td>{{Str::limit(strip_tags($model->body) , 50, '...')}}</td>
                                <td >{{ dateFormate($model->created_at)}}</td>
                                <td width='25%'>
                                 <div class="btn btn-group" style="width: 225px">

                                        <a  class="btn btn-info" href="{{route('mypost.show',$model->id)}}" role="button">View</a>
                                        <a  class="btn btn-primary" href="{{route('mypost.edit',$model->id)}}" role="button">Edit</a>
                                        <Form action="{{route('mypost.destroy',$model->id)}}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </Form>
                                 </div>
                                </td>
                              </tr>
                              @endforeach()
                            </table>
                          </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>


@endsection
