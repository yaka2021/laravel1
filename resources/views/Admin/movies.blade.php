<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>

<script>
    function confirm_test() {
    var select = confirm("本当に削除しますか？");
    return select;
    }
</script>

    <table>
    @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
    @endif
    <tr><th>ID</th><th>映画タイトル</th><th>画像URL</th><th>公開年</th><th>公開中かどうか</th><th>概要</th><th>登録日時</th><th>更新日時</th></tr>
    @foreach ($movies as $movie)
        <tr>
            <td>{{$movie->id}}</td>
            <td>{{$movie->title}}</td>
            <td>{{$movie->image_url}}</td>
            <td>{{$movie->published_year}}</td>
            <td>{{$movie->is_showing?"上映中":"上映予定"}}</td>
            <td>{{$movie->description}}</td>
            <td>{{$movie->created_at}}</td>
            <td>{{$movie->updated_at}}</td>
            <td><input type="button" value="編集" onclick="location.href='/admin/movies/{{$movie->id}}/edit'"></td>
            <td>
            <form method="POST" action="/admin/movies/{{$movie->id}}/destroy"  onsubmit="confirm_test()">
            @csrf <!-- CSRF対策-->
            @method('DELETE')
            <input type="submit" value="削除" />
            </form>
            </td>
    @endforeach
    </table>
</body>
</html>