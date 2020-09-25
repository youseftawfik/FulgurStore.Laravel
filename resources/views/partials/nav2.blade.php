<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
      <a class="nav-link" href="{{URL::to('/dashboard')}}">
          <i class="fas fa-home"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="fas fa-plus"></i>
          <span class="menu-title">Creation</span>
          <i class="fas fa-caret-down"></i>
        </a>
        <div class="collapse" id="form-elements">
          <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{URL::to('/add-category')}}">Add Category</a></li>
            <li class="nav-item"><a class="nav-link" href="{{URL::to('/add-subcategory')}}">Add Subcategory</a></li>
            <li class="nav-item"><a class="nav-link" href="{{URL::to('/add-producttype')}}">Add Product Type</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <i class="fas fa-binoculars"></i>
          <span class="menu-title">Element</span>
          <i class="fas fa-caret-down"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{URL::to('/categories')}}">Categories</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{URL::to('/Subcategory')}}">Subcategory</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{URL::to('/producttypes')}}">Product Type</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>