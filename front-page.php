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
                <h6 class="card-title"><?php the_field('car_price', get_the_id());?></h6>
                <h6 class="card-title"><?php the_field('place', get_the_id());?></h6>
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

<h1 class="mb-4">Add Your Car! </h1>

<form id="applicant-form" method="POST" action="<?php echo admin_url('admin-ajax.php');?>">
  <div class="row mb-3">
    <label for="carName" class="col-sm-2 col-form-label">Car Name</label>
    <div class="col-sm-10">
      <input type="text" name="post_title" class="form-control" id="carName">
    </div>
  </div>

  <div class="row mb-3">
    <label for="carPrice" class="col-sm-2 col-form-label">Car Price </label>
    <div class="col-sm-10">
      <input type="text" name="car_price" class="form-control" id="carPrice">
    </div>
  </div>
  
  <div class="row mb-3">
    <label for="place" class="col-sm-2 col-form-label">Place</label>
    <div class="col-sm-10">
      <input type="text" name="place" class="form-control" id="place">
    </div>
  </div>

  <input class="mb-3" type="file" name="avatar">

  

  <div class="row mb-3">
    <label for="priceValue" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="text" name="price_value" class="form-control" id="priceValue">
    </div>
  </div>

  <div class="row mb-3">
    <label for="dimensions" class="col-sm-2 col-form-label">Dimensions</label>
    <div class="col-sm-10">
      <input type="text" name="dimensions" class="form-control" id="dimensions">
    </div>
  </div>

  <div class="row mb-3">
    <label for="displacement" class="col-sm-2 col-form-label">Displacement</label>
    <div class="col-sm-10">
      <input type="text" name="displacement" class="form-control" id="displacement">
    </div>
  </div>

  <div class="row mb-3">
    <label for="horsePower" class="col-sm-2 col-form-label">Horse Power</label>
    <div class="col-sm-10">
      <input type="text" name="horse_power" class="form-control" id="horsePower">
    </div>
  </div>

  <div class="row mb-3">
    <label for="fuelType" class="col-sm-2 col-form-label">Fuel Type</label>
    <div class="col-sm-10">
      <input type="text" name="fuelType" class="form-control" id="fuelType">
    </div>
  </div>

  <div class="row mb-3">
    <label for="fuelTankCapacity
" class="col-sm-2 col-form-label">Fuel Tank Capacity
</label>
    <div class="col-sm-10">
      <input type="text" name="fuelTankCapacity" class="form-control" id="fuelTankCapacity">
    </div>
  </div>

  <div class="row mb-3">
    <label for="topSpeed
" class="col-sm-2 col-form-label">Top Speed
</label>
    <div class="col-sm-10">
      <input type="text" name="topSpeed" class="form-control" id="topSpeed">
    </div>
  </div>

  <div class="row mb-3">
    <label for="seatingCapacity
" class="col-sm-2 col-form-label">Seating Capacity
</label>
        <div class="col-sm-10">
      <input type="text" name="seatingCapacity" class="form-control" id="seatingCapacity">
</div>
  </div>


<input type="hidden" name="action" value="create_applicant">
<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

      <?php get_footer(); ?>