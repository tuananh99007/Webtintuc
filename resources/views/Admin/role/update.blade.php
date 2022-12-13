@extends('admin.layout.index')
@section('main_content')
    <form role="form" method="POST"
          action="{{ route('admin.role.postupdate', ['id' => $roleUpdate->id]) }}">
        @csrf
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update tài khoản
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $roleUpdate->name }}">
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($perenList as $index => $paren)
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <label>
                            <input type="checkbox"
                                   class="checkbox_wrapper"
                            >
                        </label>
                        Models {{$paren->name}}
                    </div>
                    <div class="row">
                        @foreach($paren->permissionchildrent as $index => $permissionId )
                            <div class="panel-body col-lg-4">
                                <div class="panel-group " id="accordion">
                                    <h5>
                                        <label>
                                            <input type="checkbox"
                                                   name="permission_id[]"
                                                   class="checkbox_childrent"
                                                   {{in_array($permissionId->id, $rolePermission) ? 'checked' : '' }}
                                                   value="{{$permissionId->id}}"
                                            >
                                        </label>
                                        {{$permissionId->name}}
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <button type="submit" class="update btn btn-default">Update</button>
        <a href="{{route('admin.role.list')}}" class="btn btn-info">Back</a>

    </form>
    <script>
        $(document).ready(function () {
            $(".update").click(function () {
                swal("Update thành công!", "", "success");
            })
        });
    </script>
    </div>
@endsection
