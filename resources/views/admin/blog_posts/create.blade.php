@extends('admin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем статью</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            @include('admin.errors')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Лицевая картинка</label>
                                <input type="file" id="exampleInputFile" name="image">
                                <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                {{ Form::select('blog_category_id', $categories, null, ['class' => 'form-control select2', 'style' => "width: 100%"]) }}
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2', 'multiple'=>'multiple', 'style' => "width: 100%"]) }}
                            </div>
                            <div class="form-group">
                                <label>Дата:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" name="date" value="{{old('date')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="checkbox-inline" name="is_recommended">
                                </label>
                                <label>
                                    Рекомендовать
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="checkbox-inline" name="status">
                                </label>
                                <label>
                                    Черновик
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Описание</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Полный текст</label>
                                <textarea name="content" id="" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{route('posts.index')}}" class="btn btn-default">Назад</a>
                        <button class="btn btn-success pull-right">Добавить</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>

@endsection
