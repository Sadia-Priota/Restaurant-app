<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }
        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }
        .custom-checkbox label:before{
            width: 18px;
            height: 18px;
        }
        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }
        .custom-checkbox input[type="checkbox"]:checked + label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
            border-color: #fff;
        }
        .custom-checkbox input[type="checkbox"]:disabled + label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }
        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }
        .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }
        .modal textarea.form-control {
            resize: vertical;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }
        .modal form label {
            font-weight: normal;
        }
    </style>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Teachers</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">&#xE147;</i>
                            <span>Add New Teacher</span></a>
{{--                        <a href="#searchEmployeeModal" class="btn btn-danger" data-toggle="modal">--}}
{{--                            <i class="material-icons">&#xE15C;</i>--}}
{{--                            <span>Delete</span></a>--}}
                        </div>
                    <div class="col-sm-6">
                        <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search here..." style="margin-top: 30px"></div>

                </div>
            </div>
           <div class="teacherDiv">
               <table class="table table-striped table-hover">
                   <thead>
                   <tr>
                       <th>ID</th>
                       <th>Name</th>
                       <th>Course</th>
                       <th>Institute</th>
                       <th>Actions</th>
                   </tr>
                   </thead>
                   <tbody>

                   @foreach($teachers as $item)

                       <tr>
                           <th scope="row">{{$item->id}}</th>
                           <td>{{$item->name}}</td>
                           <td>{{$item->course}}</td>
                           <td>{{$item->institute}}</td>

                           <td>
                               <a href="#deleteEmployee" class="delete delete_teacher" data-toggle="modal"
                                  data-id="{{ $item->id }}">
                                   <i class="material-icons" title="Delete">&#xE872;</i></a>


                               <a href="#editEmployeeModal" class="edit update_teacher" data-toggle="modal"
                                  data-id="{{ $item->id }}"
                                  data-name="{{ $item->name }}"
                                  data-course="{{ $item->course }}"
                                  data-institute="{{ $item->institute }}">
                                   <i class="material-icons" title="Edit">&#xE254;</i></a>
                           </td>
                       </tr>
                   @endforeach

                   {{--                <tr class="pagination">--}}
                   {{--                    <td colspan="6">{{ $item->links() }}</td>--}}
                   {{--                </tr>--}}

                   </tbody>
               </table>

               {{--                        {!! $item->links() !!}--}}

               <div class="clearfix">
                   <div class="hint-text">Showing <b>5</b> out of <b>"{{ $item->id }}"</b> entries</div>
                   <ul class="pagination">
                       <li colspan = "6" align = "center">{{ $teachers->links() }}</li>
                       {{--                    <li class="page-item disabled"><a href="#">Previous</a></li>--}}
                       {{--                    <li class="page-item"><a href="#" class="page-link">1</a></li>--}}
                       {{--                    <li class="page-item"><a href="#" class="page-link">2</a></li>--}}
                       {{--                    <li class="page-item"><a href="#" class="page-link">3</a></li>--}}
                       {{--                    <li class="page-item"><a href="#" class="page-link">4</a></li>--}}
                       {{--                    <li class="page-item"><a href="#" class="page-link">5</a></li>--}}
                       {{--                    <li class="page-item"><a href="#" class="page-link">Next</a></li>--}}
                   </ul>
               </div>
           </div>
        </div>
    </div>
</div>


<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" id="addModalForm">
                <div class="modal-header">
                    <h4 class="modal-title">Add Teacher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input id="name" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Course</label>
                        <textarea id="course" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Institute</label>
                        <textarea id="institute" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="button" class="btn btn-success add_teacher" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" id="updateProductForm">
                @csrf
                <input type="hidden" id="up_id">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Teacher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input id="up_name" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Course</label>
                        <textarea id="up_course" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Institute</label>
                        <textarea id="up_institute" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="button" class="btn btn-info saveForm" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete Modal HTML -->
<div id="deleteEmployee" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
{{--            <form action="" method="post" id="delete_info">--}}
{{--                @csrf--}}
                <input type="hidden" id="id">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Teacher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Record?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" class="btn btn-danger" onclick="confirmDeleteTeacher({{$item->id}})"> Delete</button>
{{--                    <input type="button" class="btn btn-danger delete_info" value="Delete">--}}
                </div>
{{--            </form>--}}
        </div>
    </div>
</div>
</div>
</body>
<script>
{{--    function deleteTeacher(){--}}
{{--        $('#deleteEmployee').modal('show');--}}
{{--    }--}}
    function  confirmDeleteTeacher(teacherId){
        console.log(teacherId);
        $.ajax({
            type: 'POST',
            url: `{{ route('confirmDelete.teacher') }}`,
            cache: false,
            data: {
                _token: "{{ csrf_token()}}",
                id: teacherId
            },
            success: function (res) {
                if (res.status === 'success') {
                    $('#deleteEmployee').modal('hide');
                    // $('#delete_info')[0].reset();
                    $('.table').load(location.href + ' .table');
                    }
                }
        });
    }

{{--        --}}{{--});--}}
{{--    }--}}
{{--    // $(document).ready(function(){--}}
{{--    //     // Activate tooltip--}}
{{--    //     // $('[data-toggle="tooltip"]').tooltip();--}}
{{--    //--}}
{{--    //     // Select/Deselect checkboxes--}}
{{--    //     // var checkbox = $('table tbody input[type="checkbox"]');--}}
{{--    //     // $("#selectAll").click(function(){--}}
{{--    //     //     if(this.checked){--}}
{{--    //     //         checkbox.each(function(){--}}
{{--    //     //             this.checked = true;--}}
{{--    //     //         });--}}
{{--    //     //     } else{--}}
{{--    //     //         checkbox.each(function(){--}}
{{--    //     //             this.checked = false;--}}
{{--    //     //         });--}}
{{--    //     //     }--}}
{{--    //     // });--}}
{{--    //     // checkbox.click(function(){--}}
{{--    //     //     if(!this.checked){--}}
{{--    //     //         $("#selectAll").prop("checked", false);--}}
{{--    //     //     }--}}
{{--    //     // });--}}
{{--    // });--}}
</script>
@include('teacher.teacher_js')
{!! Toastr::message() !!}
</html>
