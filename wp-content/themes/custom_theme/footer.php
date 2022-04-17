  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <?php if (is_active_sidebar('footer-1')) {
            dynamic_sidebar('footer-1');
          } ?>
        </div>
        <div class="col-md-3">
          <?php if (is_active_sidebar('footer-2')) {
            dynamic_sidebar('footer-2');
          } ?>
        </div>
        <div class="col-md-3">
          <?php if (is_active_sidebar('footer-3')) {
            dynamic_sidebar('footer-3');
          } ?>
        </div>
        <div class="col-md-3">
          <?php if (is_active_sidebar('footer-4')) {
            dynamic_sidebar('footer-4');
          } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p class="pull-left copyright"><small>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></small></p>
        </div>
        <div class="col-md-6">
          <div class="d-flex pull-right"> <img src="https://cdn.shopify.com/s/files/1/0635/3194/2139/files/payment_icons_300x50_2c168b89-d593-4dc9-a3e3-4459c48518fb_180x.png?v=1648816436"></div>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?php echo get_bloginfo('template_directory'); ?>/js/jquery-3.2.1.slim.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/js/popper.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo get_bloginfo('template_directory'); ?>/js/app.js"></script>
  <?php wp_footer(); ?>
</body>
</html>
