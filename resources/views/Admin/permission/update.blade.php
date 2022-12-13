@extends('admin.layout.index')
@section('main_content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Update Permission
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST"
                              action="{{ route('admin.permission.postupdate', ['id' => $permissionUpdate->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name"
                                       value="{{ $permissionUpdate->name }}">
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="update btn btn-default">Update</button>
                            <a href="{{route('admin.permission.list')}}" class="btn btn-info">quay ve</a>

                        </form>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $(".update").click(function () {
                        swal("Update thành công!", "", "success");
                    })
                });
            </script>
        </div>
@endsection
