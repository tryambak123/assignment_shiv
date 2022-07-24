<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashbord.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin<sup></sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="dashbord.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
     <span>Dashboard</span></a></li>
			
	<?php	
	      while($menu = $menuData->fetch_array()){ 	  
	  ?>		
	<li class="nav-item active">
	  <a class="nav-link" href="<?=$menu['page_name']; ?>"><span><?=$menu['menu_name']; ?></span></a></li>	
	<?php } ?>
	
    <hr class="sidebar-divider d-none d-md-block">	
  </ul>