<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Table with Edit/Delete Buttons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Todo List</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Actions</th> <!-- New column for edit/delete buttons -->
                </tr>
            </thead>
            <tbody>
                @if (count($todos))
                    @foreach ($todos as $index => $todo)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->content }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('todos.edit', ['todos' => $todo]) }}">Edit</a>

                                <form method="post" action="{{ route('todos.delete', ['todos' => $todo]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
