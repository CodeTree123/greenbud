<nav class="navbar navbar-expand d-flex flex-column align-item-start p-0" id="sidebar">
    <a href="{{route('admin_index')}}" class="   text-dark text-decoration-none mt-3">
        <img class="logo mx-auto d-block" src="{{ asset('assets/img/company/logo_one.png') }}" alt="" width="150">
    </a>

    <ul class="navbar-nav d-flex flex-column mt-3 w-100">
        <li class="nav-item w-100">
            <a href="{{route('admin_index')}}" class="nav-link text-dark pl-4">Dashboard</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('catagory')}}" class="nav-link text-dark pl-4">Catagory</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('product')}}" class="nav-link text-dark pl-4">Product</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('filter_view')}}" class="nav-link text-dark pl-4">Filteration Process Stage</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('order_list')}}" class="nav-link text-dark pl-4">Orders</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('experience_list')}}" class="nav-link text-dark pl-4">Experiences</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('team_list')}}" class="nav-link text-dark pl-4">Team Member</a>
        </li>
        <li class="nav-item w-100">
            <a href="{{route('logout')}}" class="nav-link text-dark pl-4">Logout</a>
        </li>
    </ul>
</nav>
<div class="b-example-divider" id="sidebar_shade"></div>
