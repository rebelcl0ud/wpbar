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
	$content = $mypod->field('content');
  $project_url = $mypod->field('project_url');
  $github_url = $mypod->field('github_url');
  $tech_icon_1 = $mypod->field('tech_icon_1');
  $tech_icon_2 = $mypod->field('tech_icon_2');
  $tech_icon_3 = $mypod->field('tech_icon_3');
  $tech_icon_4 = $mypod->field('tech_icon_4');
  $youtube_url = $mypod->field('youtube_url');
?>

<!-- testing pulling in correct info -->
<!--p><!?php echo $name; ?></p-->

<section id="portfolio-projects">
  <div class="container">
    <div class="project-image">
      <div class="img" style="background: url('https://cdn.dribbble.com/users/825808/screenshots/4811301/attachments/1081533/a_-_homepage.png')"></div>
    </div>
    <h1><?php echo $name ?></h1>
    <div class="info">
      <div class="buttons">
        <a href="<?php echo $project_url ?>"><i class="fas fa-desktop"></i> View Project</a>
        <a href="<?php echo $github_url ?>"><i class="fas fa-code"></i> View Code</a>
      </div>
    </div>
    <?php echo $content; ?>

    <div class="technologies">
      <h3>Technologies</h3>

      <div class="icons">
        <div class="icon">
          <img src="<?php echo $tech_icon_1; ?>">
        </div>
        <div class="icon">
          <img src="<?php echo $tech_icon_2; ?>">
        </div>
        <div class="icon">
          <img src="<?php echo $tech_icon_3; ?>">
        </div>
        <div class="icon">
          <img src="<?php echo $tech_icon_4; ?>">
        </div>
      </div>
    </div>
    <div class="video">
      <h3>Video Walkthrough</h3>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youtube_url; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
  </div>
</section>


<?php get_footer(); ?>