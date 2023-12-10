<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
<form method="GET" action="/movies">
@csrf <!-- CSRF対策-->
    <div>
        <label for="keyword">タイトル</label>
        <input type="search" name="keyword" id="keyword">
    </div>

    <div>
        <label for="all">すべて</label>
        <input type="radio" name="is_showing" id="all" checked>

        <label for="showing">上映中</label>
        <input type="radio" name="is_showing" id="showing"  value="1">

        <label for="will_show">上映予定</label>
        <input type="radio" name="is_showing" id="will_show"  value="0">
    </div>

    <input type="submit" value="検索" />
</form>
    <ul>
    @foreach ($movies as $movie)
        <li>タイトル: {{ $movie->title }}</li>
        <li>画像: {{ $movie->image_url }}</li>
    @endforeach
    </ul>
{{ $movies->links() }}
</body>
</html>