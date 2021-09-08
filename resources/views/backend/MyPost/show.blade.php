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
                            <a  class="btn btn-primary" href="{{route('mypost.index')}}" role="button">Back</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="text-align: left">
                          <div class="col-12">
                            <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>Title Name</th>
                                <th>Body</th>
                                <th>Created At</th>
                                <th>Tags</th>
                                <th>Image</th>
                              </tr>
                              </thead>
                              <tr>
                                <td>{{$myPosts->title}}</td>
                                <td>{{strip_tags($myPosts->body)}}</td>
                                <td >{{ dateFormate($myPosts->created_at)}}</td>
                                <td>
                                    @foreach($myPosts->tags as $tag)
                                        {{$tag->name}}
                                    @endforeach()
                                </td>

                                @if(!empty($myPosts->image))
                                    <td><a title="Download" target="_blank"  href="/uploads/{{$myPosts->image}}" class="btn btn-info btn-icon ml-1"><i class="fas fa-file-video"></i></a></td>
                                @endif
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
