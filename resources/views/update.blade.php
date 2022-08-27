<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">

    <title>Videogames</title>

    <script>
        function updateItem(ev, obj) {
            ev.preventDefault();
            const id = obj.getAttribute("item-id");
            const data = new FormData(obj);
    
            data.append("id", id);
            var ts = data.get("tags").replaceAll(/ *, */g, ",");
            
            data.set("tags", escape(ts));

            var params = [];
            for (const row of data) params.push(row.join("="));
            
            var url = "/api/update?" + params.join("&");
            
            fetch(url, {method: 'PUT'})
                .then(resp=>resp.text())
                .then(answ=>{
                    document.location.replace('/');
                })
        }
    </script>
</head>
<body>

<div class="container">
    <form onsubmit="updateItem(event, this)" item-id="{{ $game->id }}">
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input 
                type="text" 
                class="form-control" 
                id="title" 
                aria-describedby="title" 
                placeholder="Enter title"
                name="title"
                value="{{ $game->title }}"
            >
        </div>
        <div class="form-group">
            <label for="developer">Developer</label>
            <input 
                type="text" 
                class="form-control" 
                id="developer" 
                aria-describedby="developer" 
                placeholder="Enter developer"
                name="developer"
                value="{{ $game->developer }}"
            >
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <textarea 
                class="form-control" 
                id="tags" 
                rows="2"
                name="tags"
            >{{ $game->tags }}</textarea>
            <small id="tags" class="form-text text-muted">Enter tags separated by comma</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>