@extends('admin.layout.index')
@section('main_content')
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                List Role
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th style="text-align: center"><a class="btn btn-primary"
                                                              href="{{ route('admin.role.add') }}">ADD</a></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($roles as $index => $role)
                            <tr id="role-{{$role->id}}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td style="text-align: center">
                                    <a class="btn btn-warning"
                                       href="{{ route('admin.role.update', ['id' => $role->id]) }}">Update</a>
                                    <button class="event-delete btn btn-danger" data-id="{{ $role->id }}">delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $roles->links('Admin.components.pagination') }}
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $(".event-delete").click(function () {
                    swal({
                        title: "Are you sure?",
                        text: "Nếu xóa sẽ mất luôn",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                var id = $(this).data('id');
                                $.ajax({
                                    url: '/admin/role/delete?id=' + id,
                                    type: 'GET',
                                    success: function (html) {
                                        $("#role-" + id).remove();
                                    }
                                });
                                swal("Đã xóa thành công", {
                                    icon: "success",
                                });
                            } else {
                                swal("ko xoa thi thoi");
                            }
                        });
                });
            });
        </script>
    </div>
@endsection
