@extends('layouts.default')

@section('title')
    @parent
    | ADD Danh sách người dùng
@endsection

@push('styles')

@endpush


@section('content')
<div class="p-4" style="min-height: 800px;">
    <a href="" class="btn btn-primary" >Add New
    </a>
   <form action="{{route('addPostThuctap')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="mb-3">
        Name:
        <input type="text" name="name" class="form-control" id="">
        @error('name')
        <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
    Avatar:
        <input type="file" name="avatar" class="form-control" id="">
    </div>
    <div class="mb-3">
    Birthday:
        <input type="date" name="birthday" class="form-control" id="">
        @error('birthday')
        <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
    Biography:
        <input type="text" name="biography" class="form-control" id="">
        @error('biography')
        <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-success" > Thêm Mới  </button>
   </form>
</div>
@endsection


@push('scripts')

@endpush
