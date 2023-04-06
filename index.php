<?php get_header(); ?>

  <div class="container-fluid bg-dark text-light p-5">
      <div class="container bg-dark p-5">
          <h1 class="display-4">Welcome to my Website</h1>
          <hr>
          <p>Let's Explore more about us ! </p>
          <a href="#" class="btn btn-danger">Read More</a>
      </div>
  </div>
 
     <!--Cards-->

      <div class="container py-5 ">
        <div class="row">

        <?php 
        $wpcar = array(
          'post_type' => 'car',
          'post_status' => 'publish'
        );
        
        $carquery = new Wp_Query($wpcar);

        while($carquery->have_posts()){
          $carquery -> the_post();
        

        ?>

          <div class="col-md-3 my-4">
            <div class="card" style="width: 18rem;">
              
              <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text text-success"><?php the_post_thumbnail(array(250, 250)); ?></p>
                <h6 class="card-title"><?php the_excerpt(); ?></h6>
                <a href="<?php the_permalink(); ?>"><input type="button" value="Read More" ></a>
                <button class="my-like-btn " data-post-id="<?php echo get_the_ID(); ?>"><i class="fa-sharp fa-regular fa-heart"></i></button>
                <button class="dislike-btn" data-post-id="<?php echo get_the_ID(); ?>"><i  class="fa-regular fa-thumbs-down"></i>
              </div>
            </div>
          </div>

          <?php } ?>

          <?php
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $wp_query->max_num_pages
            ) );
      ?>
        
        </div>
      </div>


    <div class="container mb-5">

    <h1>Aplication Form</h1>

    <form id="applicant-form" method="POST" action="<?php echo admin_url('admin-ajax.php');?>">
    <div class="row mb-3">
        <label for="inputFullName" class="col-sm-2 col-form-label">Full name</label>
        <div class="col-sm-10">
        <input type="text" name="fname" class="form-control" id="inputFullName">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="inputEmail3">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
        <input type="password" name="pass" class="form-control" id="inputPassword3">
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
        <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Male" checked>
            <label class="form-check-label" for="gridRadios1">
            Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="FeMale">
            <label class="form-check-label" for="gridRadios2">
            FeMale
            </label>
        </div>
        <div class="form-check disabled">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="Other" disabled>
            <label class="form-check-label" for="gridRadios3">
            Other
            </label>
        </div>
        </div>
        <input class="my-2" type="file" name="avatar">
    </fieldset>
    <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
            Agree with policies
            </label>
        </div>
        </div>
    </div>
    <input type="hidden" name="action" value="create_applicant">
    <button type="submit" class="btn btn-primary">Submit1</button>
    </form>

</div>


     
      <?php get_footer(); ?>