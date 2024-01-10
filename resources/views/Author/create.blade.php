@extends('layouts.app')

@section('content')
    <div class="container">
        @if($author->id)<!-- TO CHECK ID ALREADY EXIST OR NOT -->
            <form action="{{ route('author.update', $author->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
            <form action="{{ route('author.store') }}" method="post" >
        @endif
        @csrf
            <div class="card">
                <div class="card-header">Add New Author</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Author Name</td>
                            <td>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $author->name) }}">
                                @error('name')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Author Address</td>
                            <td>
                                <input type="address" class="form-control" name="address" value="{{ old('address', $author->address) }}">
                                @error('address')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Author Phone Number</td>
                            <td>
                                <input type="text" class="form-control" name="phonenum" value="{{ old('phonenum', $author->phonenum) }}">
                                @error('phonenum')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Author Email</td>
                            <td>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $author->email) }}">
                                @error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning " href="{{route('author.index')}}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
