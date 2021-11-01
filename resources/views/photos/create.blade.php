@extends('layouts.app')

@section('content')
    <div class="row">
        <h3 class="mx-auto">Добавить фото в альбом</h3>
    </div>
    <div class="row">
        <form method="POST" action="/photos/store" enctype="multipart/form-data" class="mx-auto">
            @csrf
            <input type="hidden" name="album_id" value="{{ $album_id }}">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" placeholder="Название фото" class="form-control" required>

            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" placeholder="Описание фото" class="form-control" required></textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Загрузить фото</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="photo" name="photo">
                    <label class="custom-file-label" for="photo">Выбрать фото</label>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" value="Добавить">
        </form>
    </div>
@endsection
