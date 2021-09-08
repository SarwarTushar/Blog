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
                            <a  class="btn btn-primary" href="{{route('category.create')}}" role="button">Create New Category</a>
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
                                <th  width="30%">Category Name</th>
                                <th  width="20%">Status</th>
                                <th  width="20%">Action</th>
                              </tr>
                              </thead>
                              @foreach($categoryData as $key=> $model)
                              <tr>
                                <td>{{$i++}}</td>
                                <td>{{$model->name}}</td>
                                <td>{{ucfirst($model->status)}}</td>
                                <td>
                                <a  class="btn btn-primary" href="{{route('category.edit',$model->id)}}" role="button">Edit</a>|
                                {{ Form::open(['route'=>['category.destroy',$model->id], 'method'=>'delete' ,'class'=>'form-horizontal','files'=> true,'style' => 'display:inline',]) }}
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
