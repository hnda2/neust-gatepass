<!-- Main Sidebar Container -->


  <aside class="main-sidebar sidebar-dark-primary bg-navy elevation-0 "> <!---style="background:#2c2e69"
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <?php 
        if($SYS_LOGO==""){
        ?>
          <img src="../dist/img/avatar4.png" class="brand-image img-circle" alt="User Image">
        <?php }else{ ?>
          <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($SYS_LOGO); ?>" class="brand-image img-circle">
        <?php }?>
      <span class="brand-text font-weight-light">NEUST</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" >
        <div class="image">
          <?php 
          if($user['PROFILE']==""){
          ?>
           <img src="../dist/img/avatar4.png" class="img-circle elevation-0" alt="User Image">
          <?php }else{ ?>
            <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($user['PROFILE']); ?>" width="60" height="60" class="img-circle elevation-2"> </a>
          <?php }?>

        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$user['LASTNAME'].', '.$user['FIRSTNAME']; ?> <i class="fa fa-circle text-success right"></i></a>
        </div>
      </div>
      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <li class="nav-item">
          <a href="scan_getpass.php?&code=<?=urlencode(base64_encode($code))?>" class="nav-link"><i class="nav-icon fa-sharp fa-solid fa-id-card"></i>
          SCAN GATEPASS </a>
          
          </li>
            <a href="#" class="nav-link">
              <p>DASHBOARD</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="home.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
              <i class="nav-icon fa fa-desktop"></i>
              <p>HOME</p>
            </a>
          </li>
          <?php
            if($user['ROLE']=="ADMIN"){
            ?>
          <li class="nav-item">
            <a href="events.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>EVENTS</p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-header">MAINTENANCE</li>
          
         
          <!-- <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-sharp fa-solid fa-newspaper"></i>
              <p>POST NEWS
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="news.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>NEWS RECORDS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="news_comments_pending.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PENDING COMMENTS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="news_comments_approved.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>APPROVED COMMENTS</p>
                </a>
              </li>
            </ul>
          </li> -->
          
          <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="nav-icon fa-sharp fa-solid fa-id-card-clip"></i>
              <p>GATEPASS LOGS
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="getpass_logs_today.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DAILY LOGS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="getpass_logs.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ALL LOGS</p>
                </a>
              </li>
              
            </ul>
          </li>
          <?php
      if($user['ROLE']=="ADMIN"){
      ?>
          
          <li class="nav-item">
            <a href="member.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
              <i class="nav-icon fa-regular fa-users-medical"></i>
              <p>GATEPASS RECORD</p>
            </a>
          </li>
            
          <li class="nav-item">
            <a href="vehicle.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
              <i class="nav-icon fa-sharp fa-solid fa-car"></i>
              <p>VEHICLE LIST</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="report.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
              <i class="nav-icon fa-regular fa-chart-bar"></i>
              <p>REPORTS RECORD</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="staff.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
              <i class="nav-icon fa fa-sharp fa-solid fa-users"></i>
              <p>MEMBERS</p> 
            </a>
          </li>
          <li class="nav-item">
            <a href="staff_logrecord.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
              <i class="nav-icon fa fa-sharp fa-solid fa-users"></i>
              <p>USER LOG</p> 
            </a>
          </li>
          <?php } ?>


          
      <?php
      if($user['ROLE']=="ADMIN"){
      ?>
          <li class="nav-header">MANAGE SYSTEM</li>
		   
         <li class="nav-item">
              <a href="setting.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
                <i class="nav-icon fa fa-sharp fa-solid fa-browser"></i>
                <p>SETTINGS</p> 
              </a>
            </li>

            <li class="nav-header">DATABASE</li>
          <li class="nav-item">
            <a href="backup/backup.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                BACKUP
              </p>
            </a>
          </li>
          <?php } ?>
          

        <!-- <li class="nav-item">
          <li class="nav-item">
            <a href="includes/restore.php?<?=urlencode(base64_encode($code));?>" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                RESTORE
              </p>
            </a>
            </li> -->
		 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
