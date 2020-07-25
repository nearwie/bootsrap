<!-- Sidebar -->
    <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Log Book </div>
      </a>
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" style="background-color: green" id="sidebarToggle"></button>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- QUERY MENU (heading) -->
      <?php 
      $role_id = $this->session->userdata('role_id');

      $queryMenu = "SELECT `user_menu`.`id`, `menu` FROM `user_menu` JOIN `user_access_menu` ON `user_menu`.`id` = `user_access_menu`.`menu_id` WHERE `user_access_menu`.`role_id` = $role_id ORDER BY `user_access_menu`.`menu_id` ASC ";

      $menu = $this->db->query($queryMenu)->result_array();
      
       ?>


       
       <!-- LOOPING MENU -->
      <?php  foreach ($menu as $m ) : ?>
      <div class="sidebar-heading">
        <?= $m['menu']; ?>
      </div>

      <!-- SIAPKAN SUBMENU SESUAI MENU -->
      <?php
     
      $menuId = $m['id'];
      $querySubMenu = "SELECT * FROM `user_sub_menu`
                       WHERE `menu_id` = $menuId
                       AND `is_active` = 1 
                  ";

     //$subMenu = $this->db->query($querySubMenu)->result_array();
      ?>

      <?php  
      $mainMenu = $this->db->query($querySubMenu,array('is_main_menu' =>  0 ))->result();
      foreach ($mainMenu as $mn) {
      //cek submenu ?
        $subMenu = $this->db->get_where('user_sub_menu',array('is_main_menu' => $mn->id ));
        if ($subMenu->num_rows () > 0) {
          //tampilkan submenu
          echo 
          "<li class='nav-item'>
          <a class='nav-link collapsed' href='#'' data-toggle='collapse' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'>
          <i class='".$mn->icon."'></i>
          <span class='title'>".$mn->title."</span>
          <span class='selected'></span>
          </a>
          <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities' data-parent='#accordionSidebar'>";
          foreach ($subMenu -> result() as $sub) {
            echo 
            "<div class='bg-white py-2 collapse-inner rounded'>
            <a class='collapse-item' href='".$sub->url."'>".$sub->title."</a></div>";
            
          }



          echo "</div>

          </li>";

        }
        else {
          //tampilkan main mmenu
          echo "<li class='nav-item'>
        <a class='nav-link collapsed' href='".$mn->url."' data-target='#collapseUtilities' aria-expanded='true' aria-controls='collapseUtilities'>
          <i class='".$mn->icon."'></i>
          <span>".$mn->title."</span>
        </a></li>";
        }
      }
      ?>
        

     


      

    

      <hr class="sidebar-divider mt-3">

      <?php endforeach; ?>

       <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
               <span>Logout</span></a>
        </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      

    </ul>
    <!-- End of Sidebar -->