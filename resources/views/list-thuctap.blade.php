@extends('layouts.default')

@section('title')
    @parent
    | Danh sách người dùng
@endsection

@push('styles')

@endpush


@section('content')
<div class="p-4" style="min-height: 800px;">
    <a href="{{route('addThuctap')}}" class="btn btn-primary" >Add New
    </a>
   <table> 
    <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Avatar</th>
            <th>Birthday</th>
            <th>Biography</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listThuctap as $key => $value)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    <img src="{{ Storage::url($value->avatar) }}" alt="" width="100px" >
                </td>
                <td>{{ $value->birthday }}</td>
                <td>{{ $value->biography }}</td>
                <td>
                    <a href="{{route('updateThuctap', $value->id)}}" class="btn btn-warning" >Fix</a>
                    <form action="{{ route('deleteThuctap', $value->id) }}" method="post" >
                        @csrf
                        @method('delete')
                 <button onclick="return confirm ('do you want to delete?')" class="btn btn-danger" >Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
   </table>
</div>
@endsection


@push('scripts')

@endpush
