<style>
.list-group-item {
    border: none;
    padding: 5px 20px; 
    display: flex;
    height: 45px;
    align-items: center;
    gap: 15px; 
}

#sidebarMenu {
    max-height: 100vh; 
    overflow-y: auto;  
    padding-bottom: 20px;
}

.list-group-item i {
    width: 20px; 
    text-align: center; 
}

.list-group-item span {
    flex-grow: 1; 
}

.list-group-item:not(:last-child) {
    margin-bottom: 5px; 
}

.list-group-item.active {
    border-left: 4px solid blue; 
    background-color: #f8f9fa; 
    box-shadow: none; 
}



</style>

<nav id="sidebarMenu" class="collapse navbar-collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-2 mt-4">
        <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action py-2 {{ request()->routeIs('admin.index') ? 'active' : '' }}" data-mdb-ripple-init aria-current="true">
            <i class="fas fa-tachometer-alt text-muted"></i><span class="text-muted">Dashboard</span>
        </a>
        <a href="{{ route('aff_customers') }}" class="list-group-item list-group-item-action py-2 {{ request()->routeIs('aff_customers') ? 'active' : '' }}" data-mdb-ripple-init>
            <i class="fas fa-users text-muted"></i><span class="text-muted">Affiliate Customers</span>
        </a>
        <a href="{{ route('customers') }}" class="list-group-item list-group-item-action py-2 {{ request()->routeIs('customers') ? 'active' : '' }}" data-mdb-ripple-init>
            <i class="fas fa-users text-muted"></i><span class="text-muted">Customers</span>
        </a>
        <a href="{{ route('products') }}" class="list-group-item list-group-item-action py-2 {{ request()->routeIs('products') ? 'active' : '' }}" data-mdb-ripple-init>
            <i class="fas fa-box text-muted"></i><span class="text-muted">Products</span>
        </a>
        <a href="{{ route('orders') }}" class="list-group-item list-group-item-action py-2 {{ request()->routeIs('orders') ? 'active' : '' }}" data-mdb-ripple-init>
            <i class="fas fa-shopping-cart text-muted"></i><span class="text-muted">Orders</span>
        </a>
        <a href="{{ route('manage_reviews') }}" class="list-group-item list-group-item-action py-2 {{ request()->routeIs('manage_reviews') ? 'active' : '' }}" data-mdb-ripple-init>
            <i class="fa-solid fa-comments text-muted"></i><span class="text-muted">Manage Reviews</span>
        </a>
        <a href="{{ route('customer_inquiries') }}" class="list-group-item list-group-item-action py-2 {{ request()->routeIs('customer_inquiries') ? 'active' : '' }}" data-mdb-ripple-init>
            <i class="fas fa-envelope text-muted"></i><span class="text-muted">Customer Inquiries</span>
        </a>
        <a href="{{ route('category') }}" class="list-group-item list-group-item-action py-2 {{ request()->routeIs('category') ? 'active' : '' }}" data-mdb-ripple-init>
            <i class="fa-solid fa-folder-tree text-muted"></i><span  class="text-muted">Product Categories</span>
        </a>
        <a href="{{ route('show_users') }}" class="list-group-item list-group-item-action py-2 {{ request()->routeIs('show_users') ? 'active' : '' }}" data-mdb-ripple-init>
            <i class="fas fa-user text-muted"></i><span class="text-muted">User Management</span>
        </a>
        </div>
    </div>
</nav>

