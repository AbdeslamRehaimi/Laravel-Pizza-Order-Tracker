<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>

<!--
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('categories') }}'><i class='nav-icon fa fa-gift'></i> Categories</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('products') }}'><i class='nav-icon fa fa-shopping-cart'></i> Products</a></li>
-->

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-desktop"></i> Products</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('products') }}'><i class='nav-icon fa fa-shopping-cart'></i> Products</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('categories') }}'><i class='nav-icon fa fa-gift'></i> Categories</a></li>
    </ul>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('clients') }}'><i class='nav-icon fa fa-user'></i> Clients</a></li>
