<?php 
/*
Template Name: Single Project Template
*/
get_header();
?>

<?php 
	// fn come with pods
	// snags current slug
	$slug = pods_v('last', 'url');

	// snags pods obj
	$mypod = pods('project', $slug);

	// set vars
	$name = $mypod->field('name');
	$permalink = $mypod->field('permalink');
?>

<!-- testing pulling in correct info -->
<!--p><!?php echo $name; ?></p-->

<section id="portfolio-projects">
  <div class="container">
    <div class="project-image">
      <div class="img" style="background: url('https://cdn.dribbble.com/users/825808/screenshots/4811301/attachments/1081533/a_-_homepage.png')"></div>
    </div>
    <h1>Nike Project</h1>
    <div class="info">
      <div class="buttons">
        <a href="#"><i class="fas fa-desktop"></i> View Project</a>
        <a href="#"><i class="fas fa-code"></i> View Code</a>
      </div>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <div class="technologies">
      <h3>Technologies</h3>

      <div class="icons">
        <div class="icon">
          <img src="http://www.stickpng.com/assets/images/5847ea22cef1014c0b5e4833.png">
        </div>
        <div class="icon">
          <img src="http://www.stickpng.com/assets/images/5847ea22cef1014c0b5e4833.png">
        </div>
        <div class="icon">
          <img src="http://www.stickpng.com/assets/images/5847ea22cef1014c0b5e4833.png">
        </div>
        <div class="icon">
          <img src="http://www.stickpng.com/assets/images/5847ea22cef1014c0b5e4833.png">
        </div>
      </div>
    </div>
    <div class="video">
      <h3>Video Walkthrough</h3>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/cFZr-34aiVc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
</section>


<?php get_footer(); ?>