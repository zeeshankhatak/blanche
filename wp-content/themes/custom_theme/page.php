<?php get_header(); ?>

  <main>
    <div class="container">

      <div class="row">
        <section class="col">
          <?php while ( have_posts() ) : the_post(); ?>

            <article>
              <?php the_content(); ?>
            </article>

    			<?php endwhile; ?>
          <?php if (comments_open() || get_comments_number()) {
            comments_template();
          } ?>
        </section>
      </div>
    </div>
  </main>

<?php get_footer(); ?>
