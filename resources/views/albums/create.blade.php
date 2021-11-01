@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3 class="mx-auto">Создать альбом</h3>
        </div>
        <div class="row">
            <form method="POST" action="/albums/store" enctype="multipart/form-data" class="mx-auto">
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" placeholder="Имя альбома" class="form-control">

                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" placeholder="Описание альбома" class="form-control"></textarea>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Загрузить фоновое изображения</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="coverImage" name="cover_image">
                        <label class="custom-file-label" for="coverImage">Выбрать изображение</label>
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" value="Создать">
            </form>
        </div>
    </div>
@endsection
