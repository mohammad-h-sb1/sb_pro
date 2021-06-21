<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('admin.category.store')}}" method="post">
        @csrf
        <label>name</label>
        <input type="text" name="name"><br>
        <label>content</label>
        <textarea name="content"></textarea>
        <div class="i-file-upload">
            <span>آپلود بنر دوره</span>
            <input type="file" name="photo" class="file-upload" id="files" accept="image/*" />
        </div>
        <button type="submit">ارسال</button>

    </form>

</body>
</html>



