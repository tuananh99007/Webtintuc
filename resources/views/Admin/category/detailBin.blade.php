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
                            <th>Hot_flag</th>
                            <th>
                                <a class="btn btn-success" href="{{ route('admin.category.restoreAll') }}">khôi phục tất
                                    cả</a>
                                <button class="event-deleteAll btn btn-danger">
                                    xóa vĩnh viễn All
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categorysDetailBin as $index => $categoryDetailBin)
                            <tr id="category-{{$categoryDetailBin->id}}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $categoryDetailBin->name }}</td>
                                <td>{{ $categoryDetailBin->hot_flag }}</td>
                                <td>
                                    <a class="btn btn-success"
                                       href="{{ route('admin.category.restore', ['id' => $categoryDetailBin->id]) }}">khôi
                                        phục</a>
                                    <button class="event-delete btn btn-danger" data-id="{{ $categoryDetailBin->id }}">
                                        xóa vĩnh viễn
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categorysDetailBin->links('Admin.components.pagination') }}
                    <a href="{{route('admin.category.list')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {

                $(".event-deleteAll").click(function () {
                    swal({
                        title: "Bạn có chắc xóa toàn bộ sản phẩm ?",
                        text: "Nếu xóa, sản phẩm của bạn sẽ biến mất vĩnh viễn",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.href = '/admin/category/permanentlyDeletedAll'
                                swal("Xóa thành công", {
                                    icon: "success",
                                });
                            } else {
                                swal("Ko xoa thi thoi");
                            }
                        });
                });

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
                                    url: '/admin/category/permanentlyDeleted?id=' + id,
                                    type: 'GET',
                                    success: function (html) {
                                        $("#category-" + id).remove();
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
