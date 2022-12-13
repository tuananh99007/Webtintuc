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
                            <th>Title</th>
                            <th>Content</th>
                            <th>image</th>
                            <th>category_name</th>
                            <th>posts_time</th>
                            <th>users_id</th>
                            <th>
                                <a class="btn btn-primary" href="{{ route('admin.product.restoreAll') }}">khôi phục
                                    all</a>
                                <button class="event-deleteAll btn btn-danger">
                                    xóa vĩnh viễn All
                                </button>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($productsDetailBin as $index => $productDetailBin)
                            <tr id="product-{{$productDetailBin->id}}">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $productDetailBin->title }}</td>
                                <td>{{ $productDetailBin->content }}</td>
                                <td><img src="{{ asset($productDetailBin->image) }}" alt="" style="height: 60px "></td>
                                <td>{{ $productDetailBin->category_name }}</td>
                                <td>{{ $productDetailBin->post_time }}</td>
                                <td>{{ $productDetailBin->user_id }}</td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="{{ route('admin.product.restore', ['id' => $productDetailBin->id]) }}">khôi
                                        phục</a>
                                    <button class="event-delete btn btn-danger" data-id="{{ $productDetailBin->id }}">
                                        xóa vĩnh viễn
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $productsDetailBin->links('Admin.components.pagination') }}
                    <a class="btn btn-primary" href="{{ route('admin.product.list') }}">về list</a>

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
                                window.location.href = '/admin/product/permanentlyDeletedAll'
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
                                    url: '/admin/product/permanentlyDeleted?id=' + id,
                                    type: 'GET',
                                    success: function (html) {
                                        $("#product-" + id).remove();
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
