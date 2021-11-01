@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $album->name }}</h1>
        <a class="btn btn-secondary" href="/gallery">Назад</a>
        <a class="btn btn-primary" href="/photos/create/{{ $album->id }}">Добавить фото в альбом</a>
        <a href="{{URL::route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Вы уверены?')"><button type="button"class="btn btn-danger btn-large">Удалить Альбом</button></a>
        <hr>
        <div class="row">
            @foreach($album->photos as $photo)
                <div class="card mr-2" style="width: 18rem;">
                    <img class="card-img-top" src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}">
                    <div class="card-body">
                        <p class="card-title text-center"><a href="/photos/{{ $photo->id }}">{{ $photo->title }}</a></p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
