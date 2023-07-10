<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル"value="{{ old('post.title') }}"/>
                 <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p> <!--バリデーションのエラー文は$errorsという変数に格納される。$errorsからエラー文を取り出す方法としてfirst関数を使って取り出す。-->
            </div>                                                                              <!--firstの引数に-->
            <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
            </div>
            <input type="submit" value="保存"/>
        </div>
        <div class= 'footer'>
            <a href = "/">戻る</a>
        </div>
    </body>
</html>