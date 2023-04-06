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

      <?php get_footer(); ?>