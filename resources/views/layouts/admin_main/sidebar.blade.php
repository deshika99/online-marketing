<style>
.list-group-item {
    border: none;
    padding: 5px 20px; 
    display: flex;
    align-items: center;
    gap: 10px; 
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

</style>

<nav id="sidebarMenu" class="collapse navbar-collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-2 mt-4">
            <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init aria-current="true">
                <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
            </a>
            <a href="{{ route('aff_customers') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                <i class="fas fa-users"></i><span>Affiliate Customers</span>
            </a>
            <a href="{{ route('products') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                <i class="fas fa-box"></i><span>Products</span>
            </a>
            <a href="{{ route('orders') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                <i class="fas fa-shopping-cart"></i><span>Orders</span>
            </a>
            <a href="{{ route('customer_inquiries') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                <i class="fas fa-envelope"></i><span>Customer Inquiries</span>
            </a>
            <a href="{{ route('category') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                <i class="fa-solid fa-folder-tree"></i><span>Product Categories</span>
            </a>
            <a href="{{ route('users') }}" class="list-group-item list-group-item-action py-2" data-mdb-ripple-init>
                <i class="fas fa-user"></i><span>User Management</span>
            </a>
            
        </div>
    </div>
</nav>

