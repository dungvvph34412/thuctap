@extends('layouts.default')

@section('title')
    @parent
    | Update Danh sách người dùng
@endsection

@push('styles')

@endpush


@section('content')
<div class="p-4" style="min-height: 800px;">
    <a href="" class="btn btn-primary" >Add New
    </a>
   <form action="{{route('updatePutThuctap', $thuctap->id)}}" method="post" enctype="multipart/form-data" >
    @method('PUT')
    @csrf
    <div class="mb-3">
        Name:
        <input type="text" name="name" class="form-control" id="" value="{{ $thuctap->name }}" >
        @error('name')
        <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
    Avatar:
    <br>
    <img src="{{ Storage::url($thuctap->avatar) }}" alt="" width="100px" > <br>
        <input type="file" name="avatar" class="form-control" id="">
    </div>
    <div class="mb-3">
    Birthday:
        <input type="date" name="birthday" class="form-control" id="" value="{{ $thuctap->birthday }}" >
        @error('birthday')
        <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
    Biography:
        <input type="text" name="biography" class="form-control" id="" value="{{ $thuctap->biography }}" >
        @error('biography')
        <span class="text-danger" >{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-warning" > Update  </button>
   </form>
</div>
@endsection


@push('scripts')

@endpush
