@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>List of Books</h1>
            
                <table class="float-end">
                    <td><a href="{{ route('book.create') }}" class="btn btn-primary" name="">Add New Book</a></td>
                </table>
            </div>
            <div class="card-body">
                @php($i=1)
                <table class=table>
                    <tr>
                        <th>No.</th><th>Author</th><th>Email</th><th>Book Title</th><th>Book ISBN</th><th>Book Price</th><th>Book Number of Pages</th><th>Action</th>
                    </tr>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ $book->author->email }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>Rm {{ $book->price }}</td>
                            <td>{{ $book->numpages }} pages</td>
                            <td>
                                <form action="{{ route('book.destroy',$book->id) }}" method="post">
                                    <a href="{{ route('book.edit',$book->id) }}" class="btn btn-primary">Edit</a>
                                
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection