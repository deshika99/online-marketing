<style>
.list-group-item {
    border: none;
    padding: 5px 25px; 
}

#sidebarMenu {
    max-height: 100vh; 
    overflow-y: auto;  
    padding-bottom: 20px;
}
</style>

<nav id="sidebarMenu" class="collapse navbar-collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-2 mt-4">
            <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action py-3" data-mdb-ripple-init aria-current="true">
                <span>Home</span>
            </a>
            <a href="{{ route('aff_customers') }}" class="list-group-item list-group-item-action py-3" data-mdb-ripple-init>
                <span>Affiliate Customers</span>
            </a>
            <a href="{{ route('products') }}" class="list-group-item list-group-item-action py-3 " data-mdb-ripple-init>
                <span>Products</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-3 " data-mdb-ripple-init>
                <span></span>
            </a>
        </div>
    </div>
</nav>
