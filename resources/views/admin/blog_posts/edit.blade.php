@extends('admin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить статью
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                {!! Form::open(['route' => ['posts.update', $post->id], 'files' => true, 'method' => 'put']) !!}
                    <div class="box-header with-border">
                        <h3 class="box-title">Обновляем статью</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            @include('admin.errors')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title" value="{{ $post->title }}">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset($post->getImage()) }}" alt="" class="img-responsive" width="200">
                                <label for="exampleInputFile">Лицевая картинка</label>
                                <input type="file" id="exampleInputFile" name="image">
                                <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                <div class="form-group">
                                    {{ Form::select('blog_category_id', $categories,
                                    $post->getCategoryId(),
                                    ['class' => 'form-control select2', 'style' => "width: 100%"]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                {{ Form::select('tags[]', $tags, $selectedTags, ['class' => 'form-control select2', 'multiple'=>'multiple', 'style' => "width: 100%"]) }}
                            </div>
                            <div class="form-group">
                                <label>Дата:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" value="{{$post->date}}" name="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    {{ Form::checkbox("is_recommended", 1, $post->is_recommended, ['class'=> "checkbox-inline"])}}
                                </label>
                                <label>
                                    Рекомендовать
                                </label>
                            </div>
                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
                                    {{ Form::checkbox("status", 1, $post->status, ['class'=> "checkbox-inline"])}}
                                </label>
                                <label>
                                    Черновик
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Описание</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $post->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Полный текст</label>
                                <textarea name="content" id="" cols="30" rows="10" class="form-control">{{ $post->content }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{route('posts.index')}}" class="btn btn-default">Назад</a>
                        <button class="btn btn-warning pull-right">Изменить</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>

@endsection
