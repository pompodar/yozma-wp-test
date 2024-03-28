<?php use Roots\Sage\Wrapper;?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <?php
      do_action('get_header');
      get_template_part('templates/blocks/header');
    ?>

    <main class="main" role="document">
      <?php include Wrapper\template_path(); ?>
    </main>
    
    <?php
      do_action('get_footer');
      get_template_part('templates/blocks/footer');
      wp_footer();
    ?>
  </body>
</html>
