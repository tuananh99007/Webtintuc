@extends('admin.layout.index')
@section('main_content')
    <div class="col-md-12">
        <!--   Kitchen Sink -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Thùng rác
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>
                                <a class="btn btn-success" href="{{ route('admin.users.restoreAll') }}">Khôi phục tất
                                    cả</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($usersDetailBin as $index => $userDetailBin)
                            <tr id="user-{{$userDetailBin->id}}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $userDetailBin->name }}</td>
                                <td><img src="{{ asset($userDetailBin->avatar) }}" alt="" style="height: 60px ">
                                </td>
                                <td>{{ $userDetailBin->email }}</td>
                                <td>
                                    <a class="btn btn-success"
                                       href="{{ route('admin.users.restore', ['id' => $userDetailBin->id]) }}">Khôi
                                        phục</a>
                                    <button class="event-delete btn btn-danger" data-id="{{ $userDetailBin->id }}">
                                        xóa vĩnh viễn
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $usersDetailBin->links('Admin.components.pagination') }}
                    <a href="{{route('admin.users.list')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {

                $(".event-delete").click(function () {
                    swal({
                        title: "Bạn muốn xóa vĩnh viễn sản phẩm?",
                        text: "Nếu xóa, sản phẩm của bạn sẽ biến mất vĩnh viễn",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                var id = $(this).data('id');
                                $.ajax({
                                    url: '/admin/users/permanentlyDeleted?id=' + id,
                                    type: 'GET',
                                    success: function (html) {
                                        $("#user-" + id).remove();
                                    }
                                });
                                swal("Xóa thành công", {
                                    icon: "success",
                                });
                            } else {
                                swal("Ko xoa thi thoi");
                            }
                        });
                });
            });
        </script>
    </div>
@endsection
