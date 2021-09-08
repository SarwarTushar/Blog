@extends('backend.layout.master')

@section('title', 'Add Course')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3> Create Course</h3>
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
                        {!! Form::open(['route' => 'course.store','method'=>'POST','files'=> true]) !!}

                            <div class="card-body">
                                <!-- Course Name -->
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Course Name<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        {{-- {!! Form::text('name',['class' => 'form-control']) !!} --}}
                                        <input type="text" class="form-control" name="name" placeholder="Course Name" required>
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-2 col-form-label">Course Category<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="category_id" class="form-control" required>
                                            <option value="" selected>-Select Category-</option>
                                            @foreach($category as $model)
                                                <option value="{{$model->id}}">{{$model->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Short des -->
                                <div class="form-group row">
                                    <label for="short_description" class="col-sm-2 col-form-label">Course Short Description<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        {{-- {!! Form::text('name',['class' => 'form-control']) !!} --}}
                                        <input type="text" class="form-control" name="short_description" placeholder="Course Short Description" required>
                                    </div>
                                </div>

                                <!-- details -->
                                <div class="form-group row">
                                    <label for="details" class="col-sm-2 col-form-label">Course Details</label>
                                    <div class="col-sm-8">
                                        {{-- {!! Form::text('name',['class' => 'form-control']) !!} --}}
                                        <textarea class="form-control" name="details" placeholder="Course Details" ></textarea>
                                    </div>
                                </div>

                                <!-- level -->
                                <div class="form-group row">
                                    <label for="level" class="col-sm-2 col-form-label">Course Level<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="level" class="form-control" required>
                                            <option value="beginner">Beginner</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="expert">Expert</option>
                                        </select>
                                    </div>
                                </div>

                                 <!-- status -->
                                <div class="form-group row">
                                    <label for="status" class="col-sm-2 col-form-label">Status<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        <select name="status" class="form-control" required>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <!-- /.card-body -->
                            <div class="card-footer float-right">
                                <input type="submit" class="btn btn-success ">
                                <a  class="btn btn-danger" href="{{route('course.create')}}" role="button">Reset</a>
                                <a  class="btn btn-primary" href="{{route('course.index')}}" role="button">Back</a>
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
