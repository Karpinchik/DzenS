<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <title>Admin</title>
</head>
<body>

    <div class="container" style="margin-top: 20px">
        <h3>Редактор администратора</h3>
    </div>






    <div class="container" style="margin-top: 20px">
        @if (isset($results))
            <div class="container">
                <div class="data_feed_back">
                    <ul class="list-group">
                    @foreach ($results as $result)
                        <li class="list-group-item" style="background-color: oldlace">

                            <div class="form-moderation">
                                <form action="/admin" method="post">
                                    <?php echo csrf_field(); ?>

                                        <input type="text" style="display: none" value=" {{ $result->id }}" name='id'>

                                    <div class="mb-3">Запись №{{ $result->id }}, от пользователя {{ $result->name }},
                                        отправлен {{ $result->created_at }} </div>
                                    <div class="mb-3">

                                    @if(!empty($result->redactor))
                                        <div class="mb-3">Последний раз запись редактоировалась администратором {{ $result->redactor }},
                                             {{ $result->updated_at }} </div>
                                        <div class="mb-3">
                                    @endif

                                    <label for="exampleInputMessage1" class="form-label">Message</label>
                                    <input type="text" class="form-control" id="exampleInputMessage1"
                                               value=" {{ $result->message }}" name='message' aria-describedby="messageHelp">
                                    </div>
                                    <div class="mb-3 form-check">
                                        @if($result->confirmed == 1)
                                            <input type="checkbox" class="form-check-input" name="confirmed" id="exampleCheck1" checked>
                                        @elseif($result->confirmed == 0)
                                            <input type="checkbox" class="form-check-input" name="confirmed" id="exampleCheck1" >
                                        @endif
                                        <label class="form-check-label" for="exampleCheck1">Confirmed</label>
                                    </div>
                                    <button type="submit" name="btn_redaction" class="btn btn-primary">edit</button>
                                    <button type="submit" name="btn_delete" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                        <hr>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

</body>
</html>
