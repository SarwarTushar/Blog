@extends('backend.layout.master')

@section('title', 'Edit Category')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3> Edit Category</h3>
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
                        {{ Form::open(['route'=>['content.update',$contentData->id], 'method'=>'PUT' ,'class'=>'form-horizontal','files'=> true]) }}

                            @csrf
                            <div class="card-body">
                                <!-- Content Name -->
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Content Title</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" name="title"  value="{{$contentData->title}}" required>
                                    </div>
                                </div>

                                <!-- Course Name -->
                                <div class="form-group row">
                                    <label for="course_id" class="col-sm-2 col-form-label">Course <span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="course_id" class="form-control" required>
                                            <option value={{ $contentData->course_id}} selected>{{ $contentData->course->name}}</option>
                                            @foreach($course as $model)
                                                <option value="{{$model->id}}">{{$model->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Thumbnail File -->
                                <div class="form-group row">
                                    <label for="file" class="col-sm-2 col-form-label">Thumbnail</label>
                                    <div class="col-sm-8">
                                    <input type="file" class="custom-file-upload" name="thumbnail">
                                    <img src="/uploads/{{$contentData->thumbnail}}" width="100" class="img-thumbnail">
                                    <input type="hidden"  name="hidden_file_thumbnail" value="{{$contentData->thumbnail}}">
                                    </div>
                                </div>

                                <!-- additional File File -->
                                <div class="form-group row">
                                    <label for="file" class="col-sm-2 col-form-label">Additional file</label>
                                    <div class="col-sm-8">
                                    <input type="file" class="custom-file-upload" name="additional">
                                    <input type="hidden"  name="hidden_file_additional" value="{{$contentData->additional}}">
                                    </div>
                                </div>

                                <!-- video File -->
                                <div class="form-group row">
                                    <label for="file" class="col-sm-2 col-form-label">Video</label>
                                    <div class="col-sm-8">
                                    <input type="file" class="custom-file-upload" name="video">
                                    <input type="hidden"  name="hidden_file_video" value="{{$contentData->video}}">
                                    </div>
                                </div>

                                <!-- status -->
                                <div class="form-group row">
                                    <label for="class" class="col-sm-2 col-form-label">Status<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="status" class="form-control" required>
                                            <option value="active" {{ $contentData->status=='active' ? 'selected' : ''}}>Active</option>
                                            <option value="inactive" {{ $contentData->status=='inactive' ? 'selected' : ''}}>Inactive</option>
                                            <option value="pending" {{ $contentData->status=='pending' ? 'selected' : ''}}>Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer float-right">
                            {{ Form::submit('Submit',['class'=>'btn btn-success']) }}
                                <a  class="btn btn-danger" href="{{route('content.edit',['id'=>$contentData->id])}}" role="button">Reset</a>
                                <a  class="btn btn-primary" href="{{route('content.index')}}" role="button">Back</a>
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
