@extends('backend.layout.master')

@section('title', 'Category List')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Category List</h1>
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
                            <a  class="btn btn-primary" href="{{route('course.create')}}" role="button">Create New Course</a>
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
                                <th>Course Name</th>
                                <th>Category</th>
                                <th>Course Level</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                              </thead>
                              @foreach($courseData as $key=> $model)
                              <tr>
                                <td>{{$i++}}</td>
                                <td>{{$model->name}}</td>
                                <td>{{$model->category->name}}</td>
                                <td>{{ucfirst($model->level)}}</td>
                                <td>{{ucfirst($model->status)}}</td>
                                <td>
                                    <a  class="btn btn-secondary" href="{{route('course.show',$model->id)}}" role="button">View</a>|
                                    <a  class="btn btn-primary" href="{{route('course.edit',$model->id)}}" role="button">Edit</a>|
                                    {{ Form::open(['route'=>['course.destroy',$model->id], 'method'=>'delete' ,'class'=>'form-horizontal','files'=> true,'style' => 'display:inline',]) }}
                                    {{ Form::submit('Delete',['class'=>'btn btn-danger','onclick' => 'return confirm("Are You Sure Want To Delete ?")']) }}
                                    {{ Form::close() }}
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
