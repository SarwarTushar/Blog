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
                        {{ Form::open(['route'=>['content.store'], 'method'=>'POST' ,'class'=>'validation-form clearfix mt-3','files'=> true]) }}

                        <!-- /.card-header -->
                        <legend class="font-weight-semibold mb-0" style="text-align:right"><i class="icon-file-text3 mr-2"></i>Add Content <button type="button" id="add_allowance" class="btn btn-primary">Add</button></legend>
                                    <input type="hidden" id="allowance_colum_no" value="0" />
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Content Title</th>
                                                    <th>Select Course</th>
                                                    <th>Thumbnail</th>
                                                    <th>Lecture Video</th>
                                                    <th>Additional Material</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="add_allownance_rows">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer float-right">
                                    <input type="submit" class="btn btn-success ">
                                    <a  class="btn btn-danger" href="{{route('content.create')}}" role="button">Reset</a>
                                    <a  class="btn btn-primary" href="{{route('content.index')}}" role="button">Back</a>
                                </div>
                        {{ Form::close() }}
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>
<div id="all_course" style="display:none;">
    @if(sizeof($course)>0)
        @foreach($course as $key=>$value)
            <option value="{{ $value->id }}">{{ $value->name }}</option>
        @endforeach
    @endif
</div>


@endsection
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>

    $(document).ready(function () {

        $('#add_allowance').click(function(){

            var columno = $("#allowance_colum_no").val();
            columno = parseInt(columno) + 1;
            $("#allowance_colum_no").val(columno)

            var output ='<tr>';



            output += '<td class="pr-0 pl-1"><div class="form-group">';
            output += '<input type="text" class="form-control" name="title[]" placeholder="Enter Title" columno="' + columno + '"> ';
            output +='</div></td>';

            output += '<td class="pr-0 pl-1"><div class="form-group"><div class="lf-select">';
            output += '<select class="form-control select2" name="course_id[]" columno="' + columno + '">';
            output += $('#all_course').html();
            output += '</select>';
            output +='</div></div></td>';

            output += '<td class="pr-0 pl-1"><div class="form-group">';
            output += '<input type="file" class="form-control" name="thumbnail[]" columno="' + columno + '"> ';
            output +='</div></td>';

            output += '<td class="pr-0 pl-1"><div class="form-group">';
            output += '<input type="file" class="form-control" name="video[]" columno="' + columno + '"> ';
            output +='</div></td>';

            output += '<td class="pr-0 pl-1"><div class="form-group">';
            output += '<input type="file" class="form-control" name="additional[]" columno="' + columno + '"> ';
            output +='</div></td>';

            output += '<td class="pr-0 pl-1"><div class="form-group"><div class="lf-select">';
            output += '<select class="form-control select2" name="status[]" columno="' + columno + '">';
            output += '<option value="active">Active</option>';
            output += '<option value="inactive">Inactive</option>';
            output += '<option value="pending">Pending</option>';
            output += '</select>';
            output +='</div></div></td>';

            output +='<td class="pr-0 pl-1"><div class="form-group">';
            output +='<button type="button"class="btn btn-danger remove-row"><i class="icon-minus-circle2"></i>remove</button>';
            output +='</div></td>';
            $('#add_allownance_rows').append(output);

            $('.select2').select2();
            $('.remove-row').click(function(){
                $(this).closest("tr").remove();

            });
        });
    });

    $('#btn_reset').click(function () {
        location.reload();
    });

</script>
