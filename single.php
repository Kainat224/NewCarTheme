<?php get_header(); ?>


<div class="card mb-3 bg-dark text-light" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-4 py-2">
      <?php the_post_thumbnail('medium'); ?>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <p class="card-text"><?php the_excerpt(); ?></p>
        <p class="card-text"><small class="text-body-secondary"><?php echo get_the_date(); ?></small></p>
      </div>
    </div>
  </div>
</div>




<table class="table ">
<h1><?php the_title(); ?></h1>
  <thead>
    <tr>
      <th scope="col"><?php the_field('title', get_the_id());?></th>
      <th scope="col">PKR 20.0 - 48.8 <br>lacs lacs</th>
      <th scope="col">Body Type</th>
      <th scope="col">Sedan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Dimensions</th>
      <td>4620 x 1775 x 1475 mm</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

  




<?php get_footer(); ?>