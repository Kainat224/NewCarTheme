<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <?php wp_head(); ?>
    
  </head>
  <body>

 

    <div class="container-fluid exb-top-tag">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p><?php the_field('top_title', 13);?> </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid exb-secondary-header">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6">
            <ul>
              <li class="head-text-color">
              <?php the_field('phone_number', 13);?>
              </li>
              <li class="head-text-color">
              <?php the_field('title', 13);?>
                
              </li>
            </ul>
          </div>
          <div class="col-12 col-lg-6">
            <ul class="align-right">
              <li class="head-text-color">
                <?php the_field('location', 13);?>
              </li>            
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Header -->
    <header class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-12">

            <nav class="navbar navbar-expand-lg">
                <a class="mobile-logo" href="#"><img src="assets/images/logo.svg" alt=""></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#exb-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="exb-menu">

               

                <ul class="navbar-nav">

                <?php
                      wp_nav_menu( 
                        array(
                      'menu' => 'primary',
                      'container' => '',
                      'theme_location' => 'primary',
                   ) );
                ?>
               
                  <li class="nav-item logo">
                  <?php 
                  if (function_exists('the_custom_logo')){
                    the_custom_logo();
                  }

                  ?>
                  </li>

                  <?php
                      wp_nav_menu( 
                        array(
                      'menu' => 'secondary',
                      'container' => '',
                      'theme_location' => 'secondary',
                   ) );
                  ?>

                  </ul>

              </div>
              
            </nav>
          </div>
        </div>
      </div>
    </header>