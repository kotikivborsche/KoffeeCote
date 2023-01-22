<?php get_header(); ?>
<?php
/*
Template Name: News
 
*/
 
// … остальной код шаблона
?>

<section id="weeklyspecials" class="bg-darkest-gray">
    <div class="container">
        

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наша <span class="orange-accent">Афиша</span></h2>
                    
                    <h3 class="section-subheading">Развлечения, которые вам по душе</h3>
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

        <div class="fadeInUp wow">
            <div class="row">
                <div class="col-lg-12">
                    <p class="mrgn20-btm">
                       <?php the_field('main_promo') ?>
                    </p>
                </div>
            </div>
        </div>
   

        <div class="fadeInUp wow">
            <div class="row">
                <div class="col-lg-12 mrgn20-btm">
                <h2 class="section-subheading">НАШИ МЕРОПРИЯТИЯ:</h2>
                </div>
            </div>
        </div>



        <div class="row row-news">
            
        <?php
            global $post;
            
            $myposts = get_posts([
                'numberposts' => 100,
                'post_type' => 'news'
            ]);
            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                    <div class="fadeInUp wow ">
                    <div class="event-item">
                    <div class="event-item1">
                        <div class=" event-item1-pic">
                            <img class="img-responsive " src="<?= the_post_thumbnail_url();?>">
                        </div>
                        <div class="event-item1-text">
                            <h3 class="section-subheading"><strong><?php the_title() ?></strong></h3>
                            <div class="mrgn20-top" data-marked><?php the_content() ?></div>
                        </div>
                    </div>
                </div>
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
</section>
 



<?php get_footer(); ?>