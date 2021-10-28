{{--Used on the index page (so shows a small summary--}}
{{--See the guide on binshops.binshops.com for how to copy these files to your /resources/views/ directory--}}
{{--https://binshops.binshops.com/laravel-blog-package--}}
<div class='text-center blog-image d-flex align-items-center margin-top-large'>
    <?=$post->image_tag("medium", true, ''); ?>

<div class="col-md-6">
    <div class="blog-item">


        <div class="blog-inner-item">
            <h3 class=''><a href='{{$post->url($locale)}}'>{{$post->title}}</a></h3>
            <h5 class=''>{{$post->subtitle}}</h5>

            {{--Закомментировал полный вывод записи--}}
{{--            @if (config('binshopsblog.show_full_text_at_list'))
                <p>{!! $post->post_body_output() !!}</p>
            @else--}}


                <p>{!! mb_strimwidth($post->post_body_output(), 0, 400, "...") !!}</p>
{{--            @endif--}}

            <div class="post-details-bottom">
                <span class="light-text">Автор: </span> {{$post->post->author->name}} <span class="light-text">Опубликовано: </span> {{date('d M Y ', strtotime($post->post->posted_at))}}
            </div>


        </div>


    </div>

</div>

        <div class='text-center'>
            <a href="{{$post->url($locale)}}" class="btn btn-primary">Посмотреть статью</a>
        </div>
</div>
