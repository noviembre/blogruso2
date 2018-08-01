<ul class="sidebar-menu">

    <li class="header">MAIN NAVIGATION</li>

    <li class="treeview">
        <a href="#"><i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li><a href="{{route('posts.index')}}">
            <i class="fa fa-sticky-note-o"></i>
            <span>Posts</span></a>
    </li>
    <li><a href="{{route('categories.index')}}">
            <i class="fa fa-list-ul"></i>
            <span>Categorias</span></a>
    </li>

    <li><a href="{{route('tags.index')}}">
            <i class="fa fa-tags"></i>
            <span>Etiquetas</span></a>
    </li>

    <li><a href="/admin/comments">
            <i class="fa fa-commenting"></i>
            <span>Comentarios</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-green" title="Comments with no approved">
                  {{$CommentsCount}}
              </small>
            </span>
        </a>
    </li>

    <li><a href="{{route('users.index')}}">
            <i class="fa fa-users"></i>
            <span>Users</span></a>
    </li>

</ul>