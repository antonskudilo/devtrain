<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header"><b>Навигация</b></li>
            <li class="treeview"><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> <span>Админ-панель</span></a></li>
            <li><a href="{{ route('posts.index') }}"><i class="fa fa-sticky-note-o"></i> <span>Посты</span></a></li>
            <li><a href="{{ route('categories.index') }}"><i class="fa fa-list-ul"></i> <span>Категории</span></a></li>
            <li><a href="{{ route('tags.index') }}"><i class="fa fa-tags"></i> <span>Теги</span></a></li>
            <li><a href="{{ route('comments') }}"><i class="fa fa-commenting"></i> <span>Комментарии</span></a></li>
            <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
            <li><a href="{{ route('subscribers.index') }}"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>
        </ul>
    </section>
</aside>
