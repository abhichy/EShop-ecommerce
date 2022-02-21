<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('vendor-dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>



    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="productsDropdown">
            <a class="dropdown-item" href="{{route('vendor-add-product')}}">Add a Product</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('vendor-manage-product')}}">All Products</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('vendor-manage-brand')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Brands</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link " href="{{route('vendor-manage-order')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span>
        </a>
    </li>
</ul>





