{{--<script src="https://code.jquery.com/jquery-3.6.3.min.js"--}}
{{--        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="--}}
{{--        crossorigin="anonymous">--}}
{{--</script>--}}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function () {
        //alert();
        $(document).on('click', '.add_teacher', function (e) {
            e.preventDefault();

            let name = $('#name').val();
            let course = $('#course').val();
            let institute = $('#institute').val();


            $.ajax({
                type: 'POST',
                url: `{{ route('add.teacher') }}`,
                cache: false,
                data: {
                    _token: "{{ csrf_token()}}",
                    name: name,
                    course: course,
                    institute: institute
                },
                success: function (res) {
                    //console.log(data)
                    if (res.status === 'success') {
                        $('#addEmployeeModal').modal('hide');
                        $('#addModalForm')[0].reset();
                        $('.table').load(location.href + ' .table');

                    }
                }
            });


            {{--$ajax({--}}
            {{--    type:'post',--}}
            {{--    url: "{!! route('') !!}",--}}
            {{--    cache: false,--}}
            {{--    data:{},--}}

            {{--    success:function (res){--}}

            {{--    // },error: function (err){--}}
            {{--    //     let error = err.responseJSON;--}}
            {{--    //     $.each(error.errors, function (index,value){--}}
            {{--    //         $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')--}}
            {{--    //--}}
            {{--    //     });--}}

            {{--    }--}}
            {{--});--}}
        });

        // show edited form

        $(document).on('click', '.update_teacher', function () {
            // return 'pp';
            let id = $(this).data('id');
            let name = $(this).data('name');
            let course = $(this).data('course');
            let institute = $(this).data('institute');

            $('#up_id').val(id);
            $('#up_name').val(name);
            $('#up_course').val(course);
            $('#up_institute').val(institute);
        });


        //update info

        $(document).on('click', '.update_teacher', function (e) {
            e.preventDefault();

            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_course = $('#up_course').val();
            let up_institute = $('#up_institute').val();

            $.ajax({
                type: 'POST',
                url: `{{ route('update.teacher') }}`,
                cache: false,
                data: {
                    _token: "{{ csrf_token()}}",
                    up_id: up_id,
                    up_name: up_name,
                    up_course: up_course,
                    up_institute: up_institute
                },
                success: function (res) {
                    //console.log(data)
                    if (res.status === 'success') {
                        $('#editEmployeeModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href + ' .table');
                    }
                }
            });

        });
    });


    //delete info

    $(document).on('click', '.delete_teacher', function (e) {
        e.preventDefault();

        let up_id = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: `{{ route('delete.teacher') }}`,
            cache: false,
            data: {
                _token: "{{ csrf_token()}}",
                up_id: up_id
            },
            success: function (res) {
                if (res.status === 'success') {
                    $('.table').load(location.href + ' .table');
                }
            }
        });

    });

</script>
