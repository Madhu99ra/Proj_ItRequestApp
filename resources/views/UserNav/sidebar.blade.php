<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Sidebar</title>
  <!-- Add your stylesheet link and other necessary head elements here -->
  <style>
    .highlighted {
      background-color: blue; /* Change highlight color to blue */
    }
    .nav-link p {
      color: white; /* Change text color of navigation items to white */
    }
  </style>
</head>
<body>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-sidebar" data-widget="treeview" role="menu" data-accordion="false" id="sidebar-menu">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li id="nav-item1">
          <a href="userdashboard" class="nav-link">
            <p>
              Profile
            </p>
          </a>
        </li>

        <li id="nav-item2">
          <a href="request" class="nav-link">
            <p>
              Request
            </p>
          </a>
        </li>
        <li id="nav-item3">
          <a href="viewrequest" class="nav-link">
            <p>
              View Request
            </p>
          </a>
        </li>
        <li id="nav-item4">
          <a href="completedrequest" class="nav-link">
            <p>
              Completed Request
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

<script>
  
  function handleClick(event) {
    const clickedNavItem = event.target.closest('.nav-link');
    const navItemId = clickedNavItem.parentElement.id;
    
    // Remove 'highlighted' class from previously clicked navigation item
    document.querySelectorAll('.highlighted').forEach(item => {
      item.classList.remove('highlighted');
    });

    // Add 'highlighted' class to the clicked navigation item
    clickedNavItem.parentElement.classList.add('highlighted');

    // Store the id of the clicked item in local storage
    localStorage.setItem('selectedNavItem', navItemId);
  }

  // Get the id of the previously selected navigation item from local storage
  const selectedNavItem = localStorage.getItem('selectedNavItem');
  
  // If a navigation item was previously selected, highlight it
  if (selectedNavItem) {
    document.getElementById(selectedNavItem).classList.add('highlighted');
  }

  // Add click event listener to each navigation item
  document.querySelectorAll('.nav-link').forEach(item => {
    item.addEventListener('click', handleClick);
  });
</script>

</body>
</html>
