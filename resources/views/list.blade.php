<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <title>菜單</title>
</head>
<body>
    <h1>菜單</h1>
    @foreach ($drinks as $value)
        <div>
            </span>
            {{$value->id}} {{ $value->name }} {{ $value->drinkType->name }} {{ $value->cold === 1 ? "冷" : "不冷" }}  {{ $value->hot === 1 ? "熱" : "不熱" }}
            <span>
        </div>
    @endforeach
    <a href="/">回到首頁</a>
</body>
</html>