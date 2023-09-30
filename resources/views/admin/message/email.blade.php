<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FoodKing Blog</title>
</head>
<body>


@if(isset($mailData['question']))

    <h1>{{ $mailData['title'] }}</h1>

    <p>{{ $mailData['question'] }}</p>

    <p>{{ $mailData['body'] }}</p>
@elseif(isset($mailData['feedback']))
    <h1>{{ $mailData['title'] }}</h1>

    <p>
        {!! $mailData['feedback'] !!}
    </p>

@else
    <h1>{{ $mailData['title'] }}</h1>

    {!! $mailData['link'] !!}

@endif


</body>
</html>
