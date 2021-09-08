@extends('backend.layout.master')

@section('title', 'Tag List')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tag List</h1>
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
                            <a  class="btn btn-primary" href="{{route('tag.create')}}" role="button">Create New Tag</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="text-align: left">
                          <div class="col-8">
                            <?php
                              $i=1;
                            ?>
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th  width="2%">Serial No.</th>
                                <th  width="15%">Tag Name</th>
                                <th  width="10%">Action</th>
                              </tr>
                              </thead>
                              @foreach($tags as $key=> $model)
                              <tr>
                                <td>{{$i++}}</td>
                                <td>{{$model->name}}</td>
                                <td>
                                 <div class="btn btn-group">
                                    <div class="col-xs-4">
                                    <a  class="btn btn-primary" href="{{route('tag.edit',$model->id)}}" role="button">Edit</a>
                                    </div>
                                    <div class="col-xs-4">
                                    <Form action="{{route('tag.destroy',$model->id)}}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </Form>
                                    </div>
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
