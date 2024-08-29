@extends('layouts.admin_main.master')

@section('content')

<style>
  
    .action-buttons {
        padding: 5px;
        width: 35px;
    }
    .add-category-btn {
        margin-bottom: 20px;
    }

    .category-row i.arrow-right {
    display: inline-flex; 
    justify-content: center; 
    align-items: center; 
    width: 20px; 
    height: 20px; 
    border-radius: 50%; 
    border: 1px solid #007bff; 
    background-color: #fff; 
    color: #007bff; 
    padding: 0; 
    font-size: 10px;
    transition: transform 0.3s ease; 
}


.category-row[aria-expanded="true"] i.arrow-right {
    transform: rotate(90deg);
    color: #007bff;
}

.subcategory-arrow {
    display: inline-flex; 
    justify-content: center; 
    align-items: center; 
    width: 20px; 
    height: 20px; 
    border-radius: 50%; 
    border: 1px solid #007bff; 
    background-color: #fff; 
    color: #007bff; 
    padding: 0; 
    font-size: 10px;
    transition: transform 0.3s ease; 
}


.category-row:hover i.arrow-right, .subcategory-arrow:hover {
    cursor: pointer;
}   

.sub-add-btn {
    padding: 0.25rem 0.5rem; 
    font-size: 0.75rem; 
    border-radius: 0.25rem; 
    height: 1.5rem; 
}
                
</style>

<main style="margin-top: 58px">
    <div class="container py-4 px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="py-3 mb-0">Manage Categories</h3>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add New Category</a>
        </div>

        <div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th style="width:20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Main Category -->
                    <tr class="category-row" data-bs-toggle="collapse" data-bs-target="#clothesSubcategories" aria-expanded="false" aria-controls="clothesSubcategories">
                        <td>
                            <i class="fas fa-chevron-right arrow-right me-2"></i> Clothes 
                            <span class="badge badge-primary rounded-pill">2</span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    <!-- Subcategories -->
                    <tr class="collapse" id="clothesSubcategories">
                        <td colspan="2">
                            <div class="ms-4">
                                <!-- Subcategory: Kids -->
                                <div class="category-row" data-bs-toggle="collapse" data-bs-target="#kidsSubcategories" aria-expanded="false" aria-controls="kidsSubcategories">
                                    <i class="fas fa-chevron-right arrow-right me-2"></i> Kids
                                    <span class="badge badge-primary rounded-pill">2</span>
                                </div>
                                <div class="collapse ms-4" id="kidsSubcategories">
                                    <!-- Sub-subcategory 1 -->
                                    <div class="category-row mt-2" data-bs-toggle="collapse" data-bs-target="#kidsSubSubcategories1" aria-expanded="false" aria-controls="kidsSubSubcategories1">
                                        <i class="me-4 mb-3"></i> T-shirts
                                    </div>
                                    
                                    <!-- Sub-subcategory 2 -->
                                    <div class="category-row" data-bs-toggle="collapse" data-bs-target="#kidsSubSubcategories2" aria-expanded="false" aria-controls="kidsSubSubcategories2">
                                        <i class="me-4 mb-3"></i> Trousers
                                    </div>
                                    
                                </div>
                                <!-- Subcategory: Men -->
                                <div class="category-row mt-4" data-bs-toggle="collapse" data-bs-target="#menSubcategories" aria-expanded="false" aria-controls="menSubcategories">
                                    <i class="fas fa-chevron-right arrow-right me-2"></i> Men
                                    <span class="badge badge-primary rounded-pill">0</span>
                                </div>
                                <div class="collapse ms-4" id="menSubcategories">
                                    <!-- Add your sub-subcategories here if needed -->
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


    </div>
</main>



<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="categoryName" class="form-label text-black">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" placeholder="Enter category name">
                    </div>
                    <div class="mb-3">
                        <label for="subcategories" class="form-label text-black">Subcategories</label>
                        <button class="btn btn-primary mt-2 mb-2 sub-add-btn" type="button" id="addSubcategoryGroup"><i class="fas fa-plus"></i></button>
                        <div id="subcategories">
                            <div class="subcategory-wrapper mb-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Enter subcategory name">
                                    <button class="btn btn-secondary add-subsubcategory" type="button"><i class="fas fa-plus"></i></button>
                                    <button class="btn btn-danger delete-subcategory" type="button"><i class="fas fa-trash"></i></button>
                                </div>
                                <div class="sub-subcategories ms-4"></div>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-10">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="editCategoryName" class="form-label text-black">Category Name</label>
                        <input type="text" class="form-control" id="editCategoryName" placeholder="Enter category name">
                    </div>
                    <div class="mb-3">
                        <label for="editSubcategories" class="form-label text-black">Subcategories</label>
                        <div id="editSubcategories">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter subcategory name">
                                <button class="btn btn-secondary" type="button" id="addEditSubcategory"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const addSubcategoryButton = document.getElementById('addSubcategoryGroup');
    const subcategoriesContainer = document.getElementById('subcategories');

    addSubcategoryButton.addEventListener('click', function() {
        const subcategoryWrapper = document.createElement('div');
        subcategoryWrapper.className = 'subcategory-wrapper mb-3';

        const inputGroup = document.createElement('div');
        inputGroup.className = 'input-group mb-3';

        const input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control';
        input.placeholder = 'Enter subcategory name';

        const addSubSubcategoryButton = document.createElement('button');
        addSubSubcategoryButton.className = 'btn btn-secondary add-subsubcategory';
        addSubSubcategoryButton.type = 'button';
        addSubSubcategoryButton.innerHTML = '<i class="fas fa-plus"></i>';

        const deleteButton = document.createElement('button');
        deleteButton.className = 'btn btn-danger delete-subcategory';
        deleteButton.type = 'button';
        deleteButton.innerHTML = '<i class="fas fa-trash"></i>';

        inputGroup.appendChild(input);
        inputGroup.appendChild(addSubSubcategoryButton);
        inputGroup.appendChild(deleteButton);
        subcategoryWrapper.appendChild(inputGroup);

        const subSubcategoriesContainer = document.createElement('div');
        subSubcategoriesContainer.className = 'sub-subcategories ms-4'; 
        subcategoryWrapper.appendChild(subSubcategoriesContainer);

        addSubSubcategoryButton.addEventListener('click', function() {
            const subSubInputGroup = document.createElement('div');
            subSubInputGroup.className = 'input-group mb-3';

            const subSubInput = document.createElement('input');
            subSubInput.type = 'text';
            subSubInput.className = 'form-control';
            subSubInput.placeholder = 'Enter sub-subcategory name';

            const subSubDeleteButton = document.createElement('button');
            subSubDeleteButton.className = 'btn btn-danger';
            subSubDeleteButton.type = 'button';
            subSubDeleteButton.innerHTML = '<i class="fas fa-trash"></i>';

            subSubDeleteButton.addEventListener('click', function() {
                subSubcategoriesContainer.removeChild(subSubInputGroup);
            });

            subSubInputGroup.appendChild(subSubInput);
            subSubInputGroup.appendChild(subSubDeleteButton);
            subSubcategoriesContainer.appendChild(subSubInputGroup);
        });

        subcategoriesContainer.appendChild(subcategoryWrapper);
    });


    subcategoriesContainer.addEventListener('click', function(e) {
        if (e.target.closest('.add-subsubcategory')) {
            const subcategoryWrapper = e.target.closest('.subcategory-wrapper');
            const subSubcategoriesContainer = subcategoryWrapper.querySelector('.sub-subcategories');

            const subSubInputGroup = document.createElement('div');
            subSubInputGroup.className = 'input-group mb-3';

            const subSubInput = document.createElement('input');
            subSubInput.type = 'text';
            subSubInput.className = 'form-control';
            subSubInput.placeholder = 'Enter sub-subcategory name';

            const subSubDeleteButton = document.createElement('button');
            subSubDeleteButton.className = 'btn btn-danger';
            subSubDeleteButton.type = 'button';
            subSubDeleteButton.innerHTML = '<i class="fas fa-trash"></i>';

            subSubDeleteButton.addEventListener('click', function() {
                subSubcategoriesContainer.removeChild(subSubInputGroup);
            });

            subSubInputGroup.appendChild(subSubInput);
            subSubInputGroup.appendChild(subSubDeleteButton);
            subSubcategoriesContainer.appendChild(subSubInputGroup);
        }
    });

    subcategoriesContainer.addEventListener('click', function(e) {
        if (e.target.closest('.delete-subcategory')) {
            const subcategoryWrapper = e.target.closest('.subcategory-wrapper');
            subcategoriesContainer.removeChild(subcategoryWrapper);
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btn-danger');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this category?')) {
            }
        });
    });
});
</script>
<script>
document.addEventListener('click', function (e) {
    if (e.target.closest('tr[data-bs-toggle="collapse"]')) {
        let icon = e.target.closest('tr').querySelector('i.fas');
        icon.classList.toggle('fa-chevron-right');
        icon.classList.toggle('fa-chevron-down');
        
        // Collapse other subcategories when a new category is clicked
        let currentTarget = e.target.closest('tr').getAttribute('data-bs-target');
        document.querySelectorAll('.collapse').forEach(function (collapse) {
            if (collapse.id !== currentTarget.substring(1)) {
                new bootstrap.Collapse(collapse, { toggle: false }).hide();
                let arrowIcon = collapse.previousElementSibling.querySelector('i.fas');
                if (arrowIcon) {
                    arrowIcon.classList.remove('fa-chevron-down');
                    arrowIcon.classList.add('fa-chevron-right');
                }
            }
        });
    }
});
</script>


@endsection