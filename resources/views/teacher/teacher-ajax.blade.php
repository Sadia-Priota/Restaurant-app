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

        </tbody>
    </table>

    <div class="clearfix">
        <div class="hint-text">Showing <b>5</b> out of <b>"{{ $item->id }}"</b> entries</div>
        <ul class="pagination">
            <li colspan = "6" align = "center">{{ $teachers->links() }}</li>
        </ul>
    </div>
</div>
