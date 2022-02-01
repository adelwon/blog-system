<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('showCategories')}}" class="nav-link">
                        <i class="far fa-folder-open nav-icon"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('showCategories')}}" class="nav-link">
                                <i class="fas fa-list-ul nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('createCategory')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('showTags')}}" class="nav-link">
                        <i class="fas fa-tags nav-icon"></i>
                        <p>
                            Tags
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('showTags')}}" class="nav-link">
                                <i class="fas fa-list-ul nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('createTag')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('showPosts')}}" class="nav-link">
                        <i class="far fa-newspaper nav-icon"></i>
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('showPosts')}}" class="nav-link">
                                <i class="fas fa-list-ul nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('createPost')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('showUsers')}}" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('showUsers')}}" class="nav-link">
                                <i class="fas fa-list-ul nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('createUser')}}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
