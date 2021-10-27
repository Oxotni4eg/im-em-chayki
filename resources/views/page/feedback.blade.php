@extends('layouts.app')

@section('content')

    <div class="container d-flex align-items-center flex-column">

        <h2>Обратная связь</h2>

        <form role="Form" id="contactform" method="POST" class="col-lg-7">
            {{ csrf_field() }}
            <div class="font-weight-bold" id="sendmessage">
                Ваше сообщение отправлено!
            </div>
            <div class="font-weight-bold" id="senderror">
                При отправке сообщения произошла ошибка. Продублируйте его, пожалуйста, на почту администратора <span>{{ env('MAIL_ADMIN_EMAIL') }}</span>
            </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="InputSender">Имя (компания):</label>
                    <input class="form-control" id="InputSender" maxlength="245" name="InputSender" placeholder="Введите свое имя, если вы оргинизация то имя организации" type="text" required  >
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="InputPhone">Телефон:</label>
                    <input class="form-control" id="InputPhone" maxlength="13" name="InputPhone" placeholder="Введите номер в формате <+375(код города, либо оператора)(номер)>, без пробелов','+375251232323'" type="text" required >
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="InputEmail">Email:</label>
                    <input class="form-control" id="InputEmail" name="InputEmail" placeholder="Введите свой e-mail" type="email" required >
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="InputMessage">Вопрос:</label>
                    <textarea class="form-control" cols="40" id="InputMessage" name="InputMessage" rows="3" required></textarea>
                </div>
                <div class="col-lg-12 mt-4 field">
                    <p>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                        <span class="font-weight-bold" class="pull-right mt-4">* Заполните, пожалуйста, все обязательные поля!</span>
                    </p>
                </div>
        </form>

    </div>

@endsection
