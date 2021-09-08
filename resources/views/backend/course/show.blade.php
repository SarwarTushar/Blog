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
                            <a  class="btn btn-primary" href="{{route('course.index')}}" role="button">Back</a>
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

                                <th>Course Name</th>
                                <th>Category</th>
                                <th>Short Descrition</th>
                                <th>Details</th>
                                <th>Course Level</th>
                                <th>Status</th>
                              </tr>
                              </thead>
                              <tr>
                                <td>{{$courseData->name}}</td>
                                <td>{{$courseData->category->name}}</td>
                                <td>{{$courseData->short_description}}</td>
                                <td>{{$courseData->details}}</td>
                                <td>{{$courseData->level}}</td>
                                <td>{{ucfirst($courseData->status)}}</td>

                              </tr>
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
