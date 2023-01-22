<?php get_header(); ?>
<?php
/*
Template Name: About
 
*/
 
// … остальной код шаблона
?>

<!-- о нас -->
<section id="about">
  <div class="container">

    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading">О <span class="orange-accent">нас</span></h2>
          <h1 class="section-subheading">Котики и Кофе</h1>
        </div>
      </div>
    </div>

    
    <!-- усы -->
    <div class="bounceIn wow">
      <div class="border">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="mrgn30-btm">
                <img alt="border" class="img-responsive center-block" height="26" src="<?= get_template_directory_uri();?>/fonts/border.svg" width="177">
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- \усы -->
    
    <div class="fadeInUp wow">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p>
                <?php the_field('main_about');?>
                <br><br>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- \о нас -->
<!-- галерея -->
<section id="gallery">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading"> <span class="orange-accent">Атмосфера</span> <span class="dark-accent">тепла и уюта</span></h2>
          <h3 class="section-subheading">Пушистые друзья, теплый чай и печеньки... Что еще нужно для счастья?</h3>
        </div>
      </div>
    </div>
    
    <!-- усы -->
    <div class="bounceIn wow">
      <div class="border">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="mrgn30-btm">
              <img alt="border" class="img-responsive center-block" height="26" src="<?= get_template_directory_uri();?>/fonts/border.svg" width="177">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- \усы -->
    
    <!-- галерея -->
    <div class="bounceInDown wow">
      <div class="row">
        <div class="gallery-items-wrapper col-lg-12">
          <div class="gallery-items" id="gallery-masonry">


          <?php
            global $post;
            $myposts = get_posts([
                'numberposts' => 100,
                'post_type' => 'gallery'
            ]);
            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                    <div class="single-item repair">
                <figure class="gallery-image">
                  <a href="<?= the_post_thumbnail_url();?>" class="gallery-item">
                    <img src="<?= the_post_thumbnail_url();?>" class="img-responsive" width="1200" alt height="800">
                  </a>
                </figure>
              </div>
             
                    <?php
                }
            } else {
                // Постов не найдено
            }
            wp_reset_postdata(); // Сбрасываем $post
?>
                  
            
          </div>
        </div>
      </div>
     
    </div>
  </div>
</section>
 <!-- \галерея -->
 <!-- наша команда -->
<section class="bg-darkest-gray" id="team">
    <div class="container">
 
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наша <span class="orange-accent">Команда</span></h2>
                    <h3 class="section-subheading">Мы - небольшой, дружный коллектив единоКОШленников</h3>
                </div>
            </div>
        </div>


        <!-- усы -->
        <div class="bounceIn wow">
          <div class="border">
            <div class="row">
              <div class="col-lg-12 text-center">
                <p class="mrgn30-btm"><img alt="border" class="img-responsive center-block" height="26" src="<?= get_template_directory_uri();?>/fonts/border-white.svg" width="177"></p>
              </div>
            </div>
          </div>
        </div>
        <!-- \усы -->
        <div class="row">
        <?php
            global $post;
            $cnt = 0;
            $myposts = get_posts([
                'numberposts' => 20,
                'post_type' => 'staff'
            ]);
            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                    <div class="col-md-2">
                        <div class=" bounceIn wow">
                        <div class="team-member"> <img alt="<?= the_title() ?>" class="img-responsive img-thumb" src="<?= the_post_thumbnail_url();?>">
                            <h3><?= the_title() ?></h3>
                            <p><?= the_content() ?></p>
                        </div>
                        </div>
                        
                    </div>
                    
                    <?php
                    $cnt = $cnt + 1;
                    if ($cnt == 6) {
                        echo '<div class="clearfix"></div>';
                        $cnt = 0;
                    }
                }
            } else {
                // Постов не найдено
            }
            wp_reset_postdata(); // Сбрасываем $post
?>


        </div>
    </div>
</section>
<!-- наша команда -->

<?php get_footer(); ?>