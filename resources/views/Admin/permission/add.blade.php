@extends('admin.layout.index')
@section('main_content')
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                ADD Permission
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="POST" action="{{ route('admin.permission.postadd') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Nhập Permission">
                                @error('name')
                                <div style="color: red">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-default">ADD</button>
                                <a href="{{route('admin.permission.list')}}" class="btn btn-info">quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
