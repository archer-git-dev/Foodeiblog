<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Foodeiblog</title>
</head>
<body>

@if (isset($mailData['question']))

    <h1>{{ $mailData['title'] }}</h1>

    <p>{{ $mailData['question'] }}</p>

    <p>{{ $mailData['body'] }}</p>
@else
    <h1>{{ $mailData['title'] }}</h1>

    <a href="#">{{ $mailData['link'] }}</a>
@endif


</body>
</html>
