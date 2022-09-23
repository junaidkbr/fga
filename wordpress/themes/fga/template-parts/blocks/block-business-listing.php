<?php
$section_class = [
  'am-search',
  'layout-' . get_query_var('layout_index'),
  get_sub_field('section_classes')
];

$businesses = new WP_Query( array(
  'post_type'       => 'business',
  'post_status'     => 'publish',
  'posts_per_page'  => 5,
) );
?>
<section <?php fga_section_id(); ?> class="<?php echo trim(implode(' ', $section_class)); ?>">
  <?php fga_the_field('heading', '<h2 class="contact-us__heading">', '</h2>', true); ?>

  <?php if ( $businesses->have_posts() ) : ?>
    <table class="sam-search__table">
      <thead class="sam-search__thead">
        <tr class="sam-search__tr">
          <th class="sam-search__th"><?php _e( 'Status', 'fga' ); ?></th>
          <th class="sam-search__th"><?php _e( 'Business Name', 'fga' ); ?></th>
          <th class="sam-search__th"><?php _e( 'CAGE', 'fga' ); ?></th>
          <th class="sam-search__th"><?php _e( 'DUNS', 'fga' ); ?></th>
          <th class="sam-search__th"></th>
        </tr>
      </thead>

      <tbody class="sam-search__tbody">
        <?php while ( $businesses->have_posts() ) : $businesses->the_post(); ?>
          <tr class="sam-search__tr clickable-row" onclick='window.location="<?php echo the_permalink(); ?>"'>
            <td class="sam-search__td">
              <span class="mob-status"><?php _e( 'Status:', 'fga' ); ?></span>
              <span class="status__<?php the_field( 'status' ); ?>"><?php echo ucfirst( get_field( 'status' ) ); ?></span>
            </td>

            <td class="sam-search__td full-with">
              <span class="mob-status"><?php _e( 'Business Name:', 'fga' ); ?></span>
              <?php the_field( 'business_name' ); ?>
            </td>

            <td class="sam-search__td">
              <span class="mob-status"><?php _e( 'CAGE:', 'fga' ); ?></span>
              <?php the_field( 'cage' ); ?>
            </td>
            <td class="sam-search__td">
              <span class="mob-status"><?php _e( 'DUNS:', 'fga' ); ?></span>
              <?php the_field( 'duns' ); ?>
            </td>

            <td class="sam-search__td result-arrow">
              <div class="result-arrow__img"></div>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php endif; ?>
</section>

<?php
  wp_reset_postdata();
  wp_reset_query();
?>
