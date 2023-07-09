<nav class="navbar navbar-expand-lg navbar-light bg-light container-fluid shadow-sm">
<a class="navbar-brand" href="<?=SITE_URL?>">
    <img src=<?=$action->helper->loadimage("cv.png")?>  height="30" class="d-inline-block align-top" alt="">
    CV Online
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php
      if($action->user_id()){
      ?>
      <li class="nav-item">
        <a class="nav-link <?=@$myresume?>" href="<?=$action->helper->url('home')?>"><i class="bi bi-file-earmark-medical"></i> My Resumes</a>
      </li>
      <li class="nav-item">
      <a class="btn bg-transparent border border-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="bi bi-person-circle" style="color:gray;"></i> Profile</a>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel"><?=@$resume['name']?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p>Profile Will be Updated Soon!</p>
    <p>Version: 1.0.0</p>
    <a class="nav-link" href="<?=$action->helper->url('action/logout')?>"><i class="bi bi-box-arrow-left"></i> Logout</a>
  

        
   
  </div>
  
  
</div>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=$action->helper->url('action/logout')?>"><i class="bi bi-box-arrow-left"></i> Logout</a>
      </li>
      <?php
      }else{
        ?>
        <li class="nav-item">
        <a class="nav-link" href="<?=$action->helper->url('login')?>"><i class="bi bi-box-arrow-in-left"></i> Login</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=$action->helper->url('signup')?>"><i class="bi bi-box-arrow-in-left"></i> Signup</a>
      </li>
        <?php
      }
      ?>
      
    </ul>
  </div>
</nav>


