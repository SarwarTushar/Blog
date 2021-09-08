@extends('backend.layout.master')

@section('title', 'Add Category')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3> Create Category</h3>
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
                        {!! Form::open(['route' => 'category.store','method'=>'POST','files'=> true]) !!}

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Category Name<span style="color:red">*</span></label>
                                    <div class="col-sm-8">
                                        {{-- {!! Form::text('name',['class' => 'form-control']) !!} --}}
                                    <input type="text" class="form-control" name="name" placeholder="Category Name" required>
                                    </div>
                                </div>

                                 <!-- status -->
                                <div class="form-group row">
                                    <label for="class" class="col-sm-2 col-form-label">Status<span style="color:red">*</span></label>
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
                                <a  class="btn btn-danger" href="{{route('category.create')}}" role="button">Reset</a>
                                <a  class="btn btn-primary" href="{{route('category.index')}}" role="button">Back</a>
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
