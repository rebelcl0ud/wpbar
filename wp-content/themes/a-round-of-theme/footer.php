    <footer>
      <div class="social-container">
        <!-- vars assigned -->
        <?php 
          $mypod = pods('social_link');
          $mypod->find('name');
        ?>
        <!-- below loops over social stuff created -->
        <?php while ($mypod->fetch()) : ?>
          <?php 
            // set vars
            $name = $mypod->field('name');
            $content = $mypod->field('content');
            $facebook_link = $mypod->field('facebook_link');
            $dribbble_link = $mypod->field('dribbble_link');
            $twitter_link = $mypod->field('twitter_link');
            $instagram_link = $mypod->field('instagram_link');
          ?>
          <a href="<?php echo $facebook_link ?>">
            <i class="fab fa-facebook"></i>
          </a>
          <a href="<?php echo $dribbble_link ?>">
            <i class="fab fa-dribbble"></i>
          </a>
          <a href="<?php echo $twitter_link ?>">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="<?php echo $instagram_link ?>">
            <i class="fab fa-instagram"></i>
          </a>
      </div>
      <h5><?php echo $name ?></h5>
      <h6><?php echo $content ?></h6>
      <?php endwhile; ?>
      <!-- end loop over social stuff created -->
    </footer>

    <script type="module" src="<?php echo get_bloginfo('template_directory'); ?>/js/app.js"></script>

  <?php wp_footer(); ?>
  </body>
</html>
