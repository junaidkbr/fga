<?php
$section_class = [
  'contact-us',
  'layout-' . get_query_var('layout_index'),
  get_sub_field('section_classes')
];
?>
<section <?php fga_section_id(); ?> class="<?php echo trim(implode(' ', $section_class)); ?>">
  <?php fga_the_field('heading', '<h2 class="contact-us__heading">', '</h2>', true); ?>

  <form action="" method="post" class="wpcf7-form init" data-contact-form="" data-redirect-url="<?php the_sub_field( 'redirect_url' ); ?>">
    <p>
      <label class="contact-form__label">
        <span id="label-first-name"><?php _e( 'First Name', 'fga' ); ?></span><br>
        <span class="wpcf7-form-control-wrap">
          <input type="text" name="first-name" required aria-required="true" aria-labelledby="label-first-name">
        </span>
      </label>
    </p>

    <p>
      <label>
        <span id="label-last-name"><?php _e( 'Last Name', 'fga' ); ?></span><br>
        <span class="wpcf7-form-control-wrap">
          <input type="text" name="last-name" required aria-required="true" aria-labelledby="label-last-name">
        </span>
      </label>
    </p>

    <p>
      <label>
        <span id="label-business-name"><?php _e( 'Business Name', 'fga' ); ?></span><br>
        <span class="wpcf7-form-control-wrap">
          <input type="text" name="business-name" required aria-required="true" aria-labelledby="label-business-name">
        </span>
      </label>
    </p>

    <p>
      <label>
        <span id="label-cage"><?php _e( 'Cage', 'fga' ); ?></span><br>
        <span class="wpcf7-form-control-wrap">
          <input type="text" name="cage" required aria-required="true" aria-labelledby="label-cage">
        </span>
      </label>
    </p>

    <div class="full-row">
      <label>
        <span id="label-message"><?php _e( 'Message', 'fga' ); ?></span><br>
        <span class="wpcf7-form-control-wrap">
          <textarea name="message" required aria-required="true" aria-labelledby="label-message"></textarea>
          <span class="wpcf7-not-valid-tip"><?php _e( 'Please fill out this field.', 'fga' ); ?></span>
        </span>
      </label>
    </div>

    <div class="full-row">
      <input type="submit" value="<?php _e( 'Submit', 'fga' ); ?>" class="wpcf7-form-control has-spinner wpcf7-submit"><span class="wpcf7-spinner"></span>
    </div>
  </form>
</section>
