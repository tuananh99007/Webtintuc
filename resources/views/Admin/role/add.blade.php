@extends('admin.layout.index')
@section('main_content')
    <form role="form" method="POST" action="{{ route('admin.role.postadd') }}">
        @csrf
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thêm Role
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" placeholder="nhap name">
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
                            <input type="checkbox" class="checkbox_wrapper">
                        </label>
                        Models {{$paren->name}}
                    </div>
                    <div class="row">
                        @foreach($paren->permissionchildrent as $index => $parenPermission )
                            <div class="panel-body col-lg-3">
                                <div class="panel-group " id="accordion">
                                    <h5>
                                        <label>
                                            <input type="checkbox"
                                                   name="permission_id[]"
                                                   class="checkbox_childrent"
                                                   value="{{$parenPermission->id}}"
                                            >
                                        </label>
                                        {{$parenPermission->name}}
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-default">ADD</button>
        <a href="{{route('admin.role.list')}}" class="btn btn-info">Back</a>
    </form>
    <script>
        $(document).ready(function () {
            $('.checkbox_wrapper').click(function () {
                $(this).parents('.panel').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
            });
        });
    </script>

@endsection
