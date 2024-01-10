@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>List of Author</h1>
            
                <table class="float-end">
                    <td><a href="{{ route('author.create') }}" class="btn btn-primary" name="">Add New Author</a></td>
                </table>
            </div>
            <div class="card-body">
                @php($i=1)
                <table class=table>
                    <tr>
                        <th>No.</th><th>Author Name</th><th>Author Address</th><th>Author Phone Number</th><th>Author Email</th><th>Action</th>
                    </tr>
                    @foreach($authors as $author)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->address }}</td>
                            <td>{{ $author->phonenum }}</td>
                            <td>{{ $author->email }}</td>
                            <td>
                                <form action="" method="post">
                                    <a href="{{route('author.edit',$author->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('author.edit',$author->id)}}" class="btn btn-info">Details</a>
                                
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