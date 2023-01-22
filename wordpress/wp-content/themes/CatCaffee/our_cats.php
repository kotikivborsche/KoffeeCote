<?php get_header(); ?>
<?php
/*
Template Name: Cats
 
*/
 
// … остальной код шаблона
?>
<section id="menuv2">
    <div class="container">  
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наши <span class="orange-accent">котики</span></h2>
                    <h3 class="section-subheading">Мы сделаем вашу вечеринку по-настоящему теплой</h3>
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
            <div class="row no-gutter">
                <div class="col-lg-12 mrgn20-btm">
                </div>
                <div class="col-lg-12 mrgn20-btm">

                    <div class="row">
                        <div class="col-lg-12 ">



                            <?php
            global $post;
            $myposts = get_posts([
                'numberposts' => 100,
                'post_type' => 'cats'
            ]);
            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                   
                    <div class="col-md-6">
                        <div class=" bounceIn wow">
                        <div class="team-member"> <img alt="<?= the_title() ?>" class="img-responsive img-thumb" src="<?= the_post_thumbnail_url();?>">
                            <h3><?= the_title() ?></h3>
                            <p><?= the_content() ?></p>
                        </div>
                        </div>
                        
                    </div>
                    
                    <?php
                    $cnt = $cnt + 1;
                    if ($cnt == 2) {
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
                </div>  
            </div> 
        </div>
    </div>
</section>

<?php get_footer(); ?>