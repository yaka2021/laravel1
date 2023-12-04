<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    @if ($errors->any())  
        <ul>  
            @foreach ($errors->all() as $error)  
                <li>{{ $error }}</li>  
            @endforeach  
        </ul>  
    @endif 
<form method="POST" action="/admin/movies/store">
@csrf <!-- CSRF対策-->
    <table>
        <tr><th>映画タイトル</th><td><input type="text" name="title"></td></tr>
		<tr><th>画像URL</th><td><input type="text" name="image_url"></td></tr>
		<tr><th>公開年</th><td><input type="text" name="published_year"></td></tr>
        <input type="hidden" name="is_showing" value="0">
		<tr><th>公開中かどうか</th><td><label><input type="checkbox" name="is_showing" value="1">公開中ならチェックをいれてください</label></td></tr>
		<tr><th>概要</th><td><textarea name="description"></textarea></td></tr>
        <tr><td><input type="submit" value="登録"></td></tr>
    </table>
</form>

</body>
</html>