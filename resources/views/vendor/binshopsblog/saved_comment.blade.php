@extends("layouts.app",['title'=>"Saved comment"])
@section("content")

    <div class='text-center'>
        <h3>Спасибо! Ваш комментарий сохранен!</h3>

        @if(!config("binshopsblog.comments.auto_approve_comments",false) )
            <p>После того, как пользователь-администратор одобрит комментарий, он появится на сайте.!</p>
        @endif

        <a href='{{$blog_post->url(app('request')->get('locale'))}}' class='btn btn-primary'>Вернуться к сообщению в блоге</a>
    </div>

@endsection
