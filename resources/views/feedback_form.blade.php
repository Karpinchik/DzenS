<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>Form</title>
</head>
<body>
<p></p>

<div class="container">
    <h3>Form</h3>
    <form action="/" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputName1" name='name' aria-describedby="nameHelp">
            <div id="nameHelp" class="form-text">Введите имя.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name='email' aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Введите Email.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPhone1" class="form-label">Phone</label>
            <input type="text" class="form-control" id="exampleInputPhone1" name='phone' aria-describedby="phoneHelp">
            <div id="phoneHelp" class="form-text">Введите phone.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputMessage1" class="form-label">Message</label>
            <input type="text" class="form-control" id="exampleInputMessage1" name='message' aria-describedby="messageHelp">
            <div id="messageHelp" class="form-text">Введите message.</div>
        </div>
        <button type="submit" id="button" class="btn btn-primary">Submit</button>
    </form>
</div>









    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</body>
</html>
