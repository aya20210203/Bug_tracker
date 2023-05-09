<?php 
if(!session_id())
    {session_start();}
?>
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>
<style>
    .add-new{
        background-color: #4e73df;
        padding-top: 6px;
    }
    .add-new:hover{
        background-color: #4e73df;
    }
</style>
<!-- Topbar Search -->
<!-- <form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form> -->
<h2 style="color: #4e73df; font-weight: bolder; font-size: 35px; text-shadow: 2px 2px #2a3152f5;" class="nav-item">Bug Tracker</h2>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">


    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <!-- <span class="badge badge-danger badge-counter">1+</span> -->
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                notifications
            </h6>
            <?php 
            require_once '../../models/Notifications.php';
            $nt = new Notifications;
            $re = $nt->show_notifications($_SESSION['id']);
            while ($row = $re->fetch_assoc()) {
                echo  
                '<a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">'.$row['date'] .'</div>
                    <span class="font-weight-bold">'.$row['text'].'</span>
                </div>
                </a>'
                ;
            }
            
            ?>
            
            <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
        </div>
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <!-- <span class="badge badge-danger badge-counter">2</span> -->
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
                Emails
            </h6>
            <?php 
            require_once '../../models/Emails.php';
            $em = new Emails;
            $re = $em->show_emails($_SESSION['id']); 
            while ($row = $re->fetch_assoc()) {
                echo '
                <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="img/undraw_profile_1.svg"
                        alt="...">
                    <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                    <div class="text-truncate">'.$row['text'].'</div>
                    <div class="small text-gray-500">'.$row['sender_email'].'</div>
                </div>
                </a>'
                ;
            }
            ?>
            <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a> -->
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
            <img class="img-profile rounded-circle"
                src="img/undraw_profile_3.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="../registeration/profile.php">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <!-- <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity Log
            </a> -->
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="../registeration/logout.php" > <!-- data-toggle="modal" data-target="#logoutModal" -->
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400" ></i>
                Log out
            </a>
        </div>
    </li>

</ul>

</nav>

