@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Редактирование пользователя</h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => ['users.update', $user->id], 'files' => true, 'method' => 'put']) !!}
                    <div class="box-header with-border">
                        <h3 class="box-title">Редактирование пользователя</h3>
                    </div>
                    <div class="box-body">
                        @include('admin.errors')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Пароль</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="" name="password">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset($user->getAvatar()) }}" alt="" class="img-responsive" width="200">
                                <label for="exampleInputFile">Аватар</label>
                                <input type="file" id="exampleInputFile" name="avatar">

                                <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('users.index')}}" class="btn btn-default">Назад</a>
                        <button class="btn btn-success pull-right">Изменить</button>
                    </div>
                {!! Form::close() !!}
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
