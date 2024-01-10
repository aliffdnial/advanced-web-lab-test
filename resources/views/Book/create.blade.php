@extends('layouts.app')

@section('content')
    <div class="container">
        @if($book->id)<!-- TO CHECK ID ALREADY EXIST OR NOT -->
            <form action="{{ route('book.update', $book->id) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        @else
            <form action="{{ route('book.store', $book->id) }}" method="post" >
        @endif
        @csrf
            <div class="card">
                <div class="card-header">Add New Book</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Book Author</td>
                            <td>
                                <select class="form-control" name="authorid">
                                    @foreach($author as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                    @endforeach
                                </select>
                                @error('authorid')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Book Title</td>
                            <td>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $book->title) }}">
                                @error('title')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Book ISBN Number</td>
                            <td>
                                <input type="text" class="form-control" name="isbn" value="{{ old('isbn', $book->isbn) }}">
                                @error('isbn')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Book Price</td>
                            <td>
                                <input type="text" class="form-control" name="price" value="{{ old('price', $book->price) }}">
                                @error('price')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>Book Number of Pages</td>
                            <td>
                                <input type="text" class="form-control" name="numpages" value="{{ old('numpages', $book->numpages) }}">
                                @error('numpages')
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
                <a class="btn btn-warning " href="{{ route('book.index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
