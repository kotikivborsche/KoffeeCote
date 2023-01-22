<?php get_header(); ?>
<?php
/*
Template Name: Merch
 
*/
 
// … остальной код шаблона
?>
<!-- мерч -->
<section class="bg-darkest-gray" id="merch">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наш <span class="orange-accent">Мерч</span></h2>
                    <h3 class="section-subheading"> </h3>
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
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h3 class="section-subheading">Все товары Вы можете приобрести в нашем кафе     ฅ•ω•ฅ</h3>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        
        
        <div class="row">
        <?php
            global $post;
            $cnt = 0;
            $myposts = get_posts([
                'numberposts' => 100,
                'post_type' => 'products'
            ]);
            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                    <div class="col-md-3">
                <div class=" bounceIn wow">
                  <div class="merch-item"> <img alt="Открытки KoffeeCote" class="img-responsive img-thumb" src="<?= the_post_thumbnail_url();?>">
                      <h3><?= the_field('product_price') ?></h3>
                      <p><?php the_title() ?></p>                    
                  </div>
                </div>
              </div>
                    
                    <?php
                    $cnt = $cnt + 1;
                    if ($cnt == 4) {
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
<!-- \мерч -->


<?php get_footer(); ?>