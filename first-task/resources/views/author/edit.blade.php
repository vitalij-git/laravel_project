

<form action="{{route('author.update', [$author])}}" method="POST">
    Name: <input type="text" name="author_name" placeholder="Enter author name" value="{{$author->name}}" />
    Surname: <input type="text" name="author_surname" placeholder="Enter author surname" value="{{$author->surname}}" />
    Username: <input type="text" name="author_username" placeholder="Enter author username" value="{{$author->username}}" />
    @csrf
    <button type="submit">Edit </button>
</form>
