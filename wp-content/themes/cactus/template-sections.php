<?php
/**
 * Template Name: Front Page
 */
 get_header();
 ?>
<div class="page-wrap">
  <div class="container-fullwidth">
    <div class="page-inner row no-aside">
      <div class="col-main">
        <section class="post-main" role="main" id="content">
          <article class="post-entry text-left">
            <div class="cactus-sections-wrap">
              <?php do_action( 'cactus_before_sections' );?>
              <?php do_action( 'cactus_sections' );?>
              <?php do_action( 'cactus_after_sections' );?>
            </div>
          </article>
        </section>
      </div>
    </div>
  </div>
</div>
<?php
 get_footer();
