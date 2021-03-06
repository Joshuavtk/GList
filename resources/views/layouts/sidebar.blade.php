<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <div class="position-fixed">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('game.index') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-gamepad"></i>
            </div>
            <div class="sidebar-brand-text mx-3">G<sup style="top: 0">ame</sup>List</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('game.index') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span></a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{ route('game.index') }}">
                <i class="fas fa-fw fa-list-ol"></i>
                <span>Games</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('game.create') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Add new game</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Tags
        </div>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('tag.index') }}">
                <i class="fas fa-fw fa-tags"></i>
                <span>Manage Tags</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('tag.create') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Create new Tag</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
    {{--    <li class="nav-item active">--}}
    {{--        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"--}}
    {{--           aria-controls="collapseTwo">--}}
    {{--            <i class="fas fa-fw fa-cog"></i>--}}
    {{--            <span>Tags</span>--}}
    {{--        </a>--}}
    {{--        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
    {{--            <div class="bg-white py-2 collapse-inner rounded">--}}
    {{--                <h6 class="collapse-header">Pages:</h6>--}}
    {{--                <a class="collapse-item" href="buttons.html">All Tags</a>--}}
    {{--                <a class="collapse-item active" href="cards.html">Create new Tag</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </li>--}}

    {{--    <!-- Nav Item - Utilities Collapse Menu -->--}}
    {{--    <li class="nav-item">--}}
    {{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
    {{--           aria-expanded="true" aria-controls="collapseUtilities">--}}
    {{--            <i class="fas fa-fw fa-wrench"></i>--}}
    {{--            <span>Utilities</span>--}}
    {{--        </a>--}}
    {{--        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">--}}
    {{--            <div class="bg-white py-2 collapse-inner rounded">--}}
    {{--                <h6 class="collapse-header">Custom Utilities:</h6>--}}
    {{--                <a class="collapse-item" href="utilities-color.html">Colors</a>--}}
    {{--                <a class="collapse-item" href="utilities-border.html">Borders</a>--}}
    {{--                <a class="collapse-item" href="utilities-animation.html">Animations</a>--}}
    {{--                <a class="collapse-item" href="utilities-other.html">Other</a>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </li>--}}


    <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-block">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    <div>
</ul>
<!-- End of Sidebar -->
