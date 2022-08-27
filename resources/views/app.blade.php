<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">

    <title>Videogames</title>
</head>
<body>
    <div class="container">
        <table class="table table-striped">
        <tr>
            <td colspan="6">
                <div class="container">
                    <a
                        type="button"
                        class="btn btn-success d-flex justify-content-center"
                        href="/create"
                    >
                        <i class="bi bi-plus-circle"></i> Add new
                    </a>
                </div>
            </td>
        </tr>
        <tr>
            <form>
                <td>
                    <input 
                        type='text'
                        class='form-control'
                        name='id'
                        placeholder="id"
                    >
                </td>
                <td>
                    <input 
                        type='text'
                        class='form-control'
                        name='title'
                        placeholder='title'
                    >
                </td>
                <td>
                    <input 
                        type='text'
                        class='form-control'
                        name='developer'
                        placeholder='developer'
                    >
                </td>
                <td>
                    <select 
                        class='form-select'
                        name='tags'
                    >
                        <option value=''>Default</option>
                        @foreach ($tags as $tag)
                            <option>{{ $tag }}</option>
                        @endforeach
                    </select>
                </td>
                <td colspan='2'>
                    <input 
                        type='submit'
                        class='form-control btn btn-primary'
                        value='Filter'
                    >
                </td>
            </form>
        </tr>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Developer</th>
            <th scope="col">Tags</th>
            <th scope="col">Delete</th>
            <th scope="col">Update</th>
        </tr>
        @foreach ($games as $game)
            <tr>
                <th>{{ $game->id }}</td>
                <td>{{ $game->title }}</td>
                <td>{{ $game->developer }}</td>
                <td>{{ $game->tags }}</td>
                <td>
                    <div class="container">
                        <a
                            type="button"
                            class="btn btn-danger"
                            href="/delete/{{ $game->id }}"
                        >
                            <i class="bi bi-trash3-fill"></i>
                        </a>
                    </div>
                </td>
                <td>
                    <div class="container">
                        <a
                            type="button"
                            class="btn btn-primary"
                            href="/update/{{ $game->id }}"
                        >
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </table>
    </div>
</body>
</html>