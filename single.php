<?php get_header(); ?>


<div class="card mb-3 bg-dark text-light" style="max-width: 100%;">
  <div class="container">
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
</div>


<div class="container my-5">
    <table class="table ">
    <h1><?php the_title(); ?></h1>
      <thead>
        <tr>
          <th scope="col"><?php the_field('title', get_the_id());?></th>
          <th scope="col"><?php the_field('price', get_the_id());?></th>
          <th scope="col">Fuel Type</th>
          <th scope="col"><?php the_field('fuel_type', get_the_id());?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Dimensions</th>
          <td><?php the_field('dimensions', get_the_id());?></td>
          <td>Fuel Tank Capacity</td>
          <td><?php the_field('fuel_tank_capacity', get_the_id());?></td>
        </tr>
        <tr>
          <th scope="row">Displacement</th>
          <td><?php the_field('displacement', get_the_id());?></td>
          <td>Top Speed</td>
          <td><?php the_field('top_speed', get_the_id());?></td>
        </tr>

        <tr>
          <th scope="row">Horse Power</th>
          <td><?php the_field('horse_power', get_the_id());?></td>
          <td>Seating Capacity</td>
          <td><?php the_field('seating_capacity', get_the_id());?></td>
        </tr>
        
      </tbody>
    </table>
</div>


<?php get_footer(); ?>