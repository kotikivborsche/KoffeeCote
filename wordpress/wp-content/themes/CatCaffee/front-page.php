<?php
get_header();
?>
    
   
    
<!-- видеофон на главной -->
<div id="video-wrap" class="video-wrap">
  <div class="bv-video-wrap -wrap-0" style="position: absolute;">
      <video autoplay muted loop id="bgvideo" class="center-block">
      <source src="<?= get_template_directory_uri();?>/video/cat.mp4" type="video/mp4">
      </video>
  </div>
  <div class="content-overlay text-center">
    
    <!-- лого, адрес и телефон -->
    
    <div class="intro-text">
      
      <div class="intro-lead-in">
        <img alt="KoffeeCote" class="img-responsive center-block" height="123" src="<?= get_template_directory_uri();?>/images/koffeecote.png" width="682">
        <div class="mrgn20-btm">
            <img alt="KoffeeCote" src="<?= the_field('logo')?>"> 
        </div>
      </div>
      <div class="intro-heading"> Котокафе </div>
      <div class="intro-lead-in">
        
          <h3 style="color: white"><strong>
              БЕРЕЗНИКИ<br>
              <br><span>МИРА, 86. Тел. <a href="tel:<?php the_field('main_phone'); ?>"><?php the_field('main_phone'); ?></a></span>
              <br>
          </strong></h3>

          
      </div>
    </div>
    <!-- \лого, адрес и телефон -->
    
  </div>
</div>
    
<!-- о нас -->
<section id="about">
  <div class="container">
    <!-- Заголовок и подзаголовок -->
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading">О <span class="orange-accent">нас</span></h2>
          <h1 class="section-subheading">Котики и Кофе</h1>
        </div>
      </div>
    </div>
    <!-- \Заголовок и подзаголовок -->
    
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
<!-- тарифы -->
<section class="bg-darkest-gray" id="weeklyspecials">
    <div class="container">
        <!-- Заголовок и подзаголовок -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наши <span class="orange-accent">Цены</span></h2>
                    <h3 class="section-subheading">
                    <p><?php the_field('main_price') ?></p>
                    </h3>
                </div>
            </div>
        </div>
        <!-- /.Заголовок и подзаголовок -->
        <!-- усы -->
        <div class="bounceIn wow">
            <div class="border">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="mrgn30-btm">
                            <img alt="border" class="img-responsive center-block" height="26" src="<?= get_template_directory_uri();?>/fonts/border-white.svg" width="177">
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- \усы -->
        <!-- карта веганов -->
        <div class="bounceIn wow">
            <div class="border">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="mrgn30-btm">
                            <a href="https://vegcard.com"><img alt="border" class="img-responsive center-block" height="52" src="<?= get_template_directory_uri();?>/images/veg.png" width="354"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
       <!-- \карта веганов -->
    </div>
</section>
    <!-- \тарифы -->

<!-- бронирование -->
<section class="bg-darkest-gray" id="booking">
  <div class="container">
    <!-- Заголовок и подзаголовок -->
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading">Забронировать <span class="orange-accent">посещение</span></h2>
        </div>
      </div>
    </div>
    <!-- /.Заголовок и подзаголовок -->
    
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
        <div class="col-md-10 col-md-offset-1 text-center">
          <div class="weeklyspecials-bg">
            
              <p><?php the_field('main_booking')?><br>
              <br>
              <strong>Позвонить: </strong><a href="tel:<?php the_field('main_phone'); ?>"><?php the_field('main_phone'); ?></a> <br>
                  <strong>Забронировать посещение:</strong> <br><br>
        
        <a class="btn-outline-orange" href="http://localhost/wordpress/%d0%bb%d0%b8%d1%87%d0%bd%d1%8b%d0%b9-%d0%ba%d0%b0%d0%b1%d0%b8%d0%bd%d0%b5%d1%82/" style="font-size:20px; padding-left: 15px; padding-right: 15px;"><strong>Забронировать</strong></a></p>
          </div>
        </div>
      </div>
    </div>
   
  </div>

</section>
<!-- \бронирование -->
    

<!-- акции -->
<section id="events_2" class="bg-darkest-gray">
    <div class="container">
        <!-- Заголовок и подзаголовок -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наши <span class="orange-accent">Акции</span></h2>
                </div>
            </div>
        </div>
        <!-- /.Заголовок и подзаголовок -->
        
        <!-- усы -->
        <div class="bounceIn wow">
            <div class="border">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="mrgn30-btm"><img alt="border" class="img-responsive center-block" height="26" src="<?= get_template_directory_uri();?>/fonts/border.svg" width="177"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- \усы -->
        
        <div class="row row-news">
            
        <?php
            global $post;
            $myposts = get_posts([
                'numberposts' => 16,
                'post_type' => 'promo'
            ]);
            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                   <div class="col-md-6 event-item">
                    <div>
                        <div class="bounceIn wow"> 
                            <img alt class="img-responsive center-block" src="<?= the_post_thumbnail_url();?>">
                        </div>
                        <div class="fadeInUp wow">
                            <div class="mrgn20-top" data-marked></div>
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
<!-- \акции -->
    
<!-- наши котики -->
<section id="menuv2">
    <div class="container">
        <!-- Заголовок и подзаголовок -->
        
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наши <span class="orange-accent">котики</span></h2>
                    <h3 class="section-subheading">Мы сделаем вашу вечеринку по-настоящему теплой</h3>
                </div>
            </div>
        </div>
        <!-- /.Заголовок и подзаголовок -->
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
                    <!-- Menu Content -->
                    <div class="row">
                        <div class="col-lg-12 ">
                            <!-- Panel Group -->
                            <div class="panel-group">


                            <?php
            global $post;
            $myposts = get_posts([
                'numberposts' => 16,
                'post_type' => 'cats'
            ]);
            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                    <div class="col-md-6 no-padding">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading menu01" style="background-image: url(<?= the_post_thumbnail_url();?>); background-repeat: no-repeat;">
                            <h3 class="panel-title"> 
                                <!-- для персональной карточки -->
                                <!-- <a role="button" data-cat-dialog-toggler="<?//= the_ID()?>" data-toggle="modal" data-target="#cat-form">  -->
                                <a href="наши-котики/">
                                    <?php the_title() ?>
                                </a> 
                            </h3>
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
                    </div>
                   
                </div>
                
                
            </div>    
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                   
                    <h3 class="section-subheading">... и другие наши пушистики ждут Вас в гости! (^=◕ᴥ◕=^)</h3>
                </div>
            </div>
        </div> 
    </div>
    
</section>
<!-- \наши котики -->
<!-- мерч -->
<section class="bg-darkest-gray" id="merch">
    <div class="container">
        <!-- Заголовок и подзаголовок -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наш <span class="orange-accent">Мерч</span></h2>
                    <h3 class="section-subheading"> </h3>
                </div>
            </div>
        </div>
        <!-- /.Заголовок и подзаголовок -->

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
                'numberposts' => 12,
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
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    
                    <h3 class="section-subheading">...эти и множество других классных плюшек Вы найдете в нашем котокафе  ^ↀᴥↀ^</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- \мерч -->

<!-- мероприятия -->
<section id="events">
    <div class="container">
        
        <!-- Заголовок и подзаголовок -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наша <span class="dark-accent">Афиша</span></h2>
                    
                    <h3 class="section-subheading">Развлечения, которые вам по душе</h3>
                </div>
            </div>
        </div>
        <!-- /.Заголовок и подзаголовок -->
        
        <!-- усы -->
        <div class="bounceIn wow">
            <div class="border">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="mrgn30-btm"><img alt="border" class="img-responsive center-block" height="26" src="<?= get_template_directory_uri();?>/fonts/border.svg" width="177"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- \усы -->


        <div class="fadeInUp wow">
            <div class="row">
                <div class="col-lg-12">
                    <p class="mrgn20-btm">
                       <?php the_field('main_promo'); ?>
                    </p>
                </div>
            </div>
        </div>
 

        <div class="row row-news">
            
        <?php
            global $post;
            $cnt = 0;
            $myposts = get_posts([
                'numberposts' => get_field('news_cnt'),
                'post_type' => 'news'
            ]);
            if( $myposts and get_field('news_cnt')>0){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                    <div class="col-md-6 event-item">
                    <div>
                        <div class="bounceIn wow">
                            <img alt class="img-responsive center-block" src="<?= the_post_thumbnail_url();?>">
                        </div>
                        <div class="fadeInUp wow">
                            <div class="mrgn20-top" data-marked><?php the_content() ?></div>
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
<!-- \мероприятия -->
    
    
    
<!-- наша команда -->
<section class="bg-darkest-gray" id="team">
    <div class="container">
        <!-- Заголовок и подзаголовок -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="fadeInDown wow">
                    <h2 class="section-heading">Наша <span class="orange-accent">Команда</span></h2>
                    <h3 class="section-subheading">Мы - небольшой, дружный коллектив единоКОШленников</h3>
                </div>
            </div>
        </div>
        <!-- /.Заголовок и подзаголовок -->

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
            $myposts = get_posts([
                'numberposts' => 6,
                'post_type' => 'staff'
            ]);
            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                    <div class="col-md-2">
                        <div class=" bounceIn wow">
                        <div class="team-member"> <img alt="Аня" class="img-responsive img-thumb" src="<?= the_post_thumbnail_url();?>">
                            <h3><?= the_title() ?></h3>
                            <p><?= the_content() ?></p>
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
<!-- наша команда -->
<!-- галерея -->
<section id="gallery">
  <div class="container-fluid">
    <!-- Заголовок и подзаголовок -->
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading"> <span class="orange-accent">Атмосфера</span></h2>
          <h3 class="section-subheading">Наше уютное пространство</h3>
        </div>
      </div>
    </div>
    <!-- /.Заголовок и подзаголовок -->
    
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
    

    <div class="bounceInDown wow">
      <div class="row">
        <div class="gallery-items-wrapper col-lg-12">
          <div class="gallery-items" id="gallery-masonry">


          <?php
            global $post;
            $myposts = get_posts([
                'numberposts' => 12,
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
<!-- \галерея  -->

<!-- правила -->
<section class="bg-darkest-gray" id="Rules">
  <div class="container"> 
    <!-- Заголовок и подзаголовок -->
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading">Наши <span class="orange-accent">Правила</span></h2>
          <h3 class="section-subheading">Правила посещения Котокафе</h3>
        </div>
      </div>
    </div>
    <!-- /.Заголовок и подзаголовок --> 
    
    <!-- усы -->
    <div class="bounceIn wow">
      <div class="border">
        <div class="row">
          <div class="col-lg-12 text-center">
            <p class="mrgn30-btm"><img alt="border" class="img-responsive center-block" height="26" src="<?= get_template_directory_uri();?>/fonts/border-black.svg" width="177"></p>
          </div>
        </div>
      </div>
    </div>
    <!-- \усы --> 
    
 
    <div class="fadeInUp wow">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <div class="weeklyspecials-bg">
            <p><br>
      
              <?php the_field('main_rules') ?>
        
          </p></div>
        </div>
      </div>
    </div>

  </div>

</section>
<!-- \правила -->
    

<!-- FAQ  -->
<section class="bg-darkest-gray" id="FAQ">
  <div class="container"> 
    <!-- Заголовок и подзаголовок -->
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading">Вопрос-<span class="orange-accent">Ответ</span></h2>
          <h3 class="section-subheading">Что вас интересует?</h3>
        </div>
      </div>
    </div>
    <!-- /.Заголовок и подзаголовок --> 
    
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
        <div class="col-md-10 col-md-offset-1 text-center">
          <div class="weeklyspecials-bg">
            <p>

            <?php
            global $post;
            $myposts = get_posts([
                'numberposts' => 7,
                'post_type' => 'faq'
            ]);
            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
                    ?>
                    <strong class="title orange-accent"><?=the_title() ?></strong><br>
                    <?=the_content() ?>
              <br>
              <br>
                    
                    <?php
                }
            } else {
                // Постов не найдено
            }
            wp_reset_postdata(); // Сбрасываем $post
?>
Не нашли ответ на свой вопрос? Тогда можете заглянуть <a href="посетителям#FAQ"><strong>сюда</strong></a>, задать свой вопрос в наших <a href="#social-med"><strong>соцсетях</strong></a> или <a href="#contact" class="contact-form1"><strong>тут</strong></a>.
 <br><br>
        Если вы не прошли мимо и спасли бездомное животное, найти подробную инструкцию, что делать, можно <a href="https://vk.com/topic-129363778_34613108"><strong>здесь</strong></a>
        </p>
        
        
          </div>
        </div>
      </div>
    </div>

  </div>

</section>
<!-- \FAQ -->
    

<!-- контакты -->
<section id="contact">
  <div class="container"> 
    
    <div class="row">
      <div class="col-lg-12 text-center mrgn20-btm">
        <div class="fadeInDown wow">
          <h2 class="section-heading">Наши <span class="orange-accent">Контакты</span></h2>
          <p>
            <img alt="Contact Us" class="img-responsive center-block" src="<?= get_template_directory_uri();?>/fonts/fork-knife_.svg"> 
          </p>
          <div class="intro-lead-in">
              <h3><strong>БЕРЕЗНИКИ<br>
              МИРА, 86<br>
              <a href="tel:<?php the_field('main_phone') ?>"><?php the_field('main_phone') ?></a></strong></h3>
              <br><br>
              
               
              
              
          </div>
        </div>
      </div>
    </div>
    <!-- \контакты --> 

    <!-- карты -->
    <div class="row"> 
      
      <!--карта1-->
      <div class="col-sm-5 col-sm-offset-1 mrgn20-btm">
        <img alt="Map1" class="img-responsive" src="<?= get_template_directory_uri();?>/images/Map1.png"> 
      </div>
      <!--\карта1-->

      
      <!-- карта2 -->
      <div class="col-sm-5">
        <img alt="Map2" class="img-responsive" src="<?= get_template_directory_uri();?>/images/Map2.png"> 
      </div>
      <!-- карта2 -->  

    </div>
    <!-- \карты -->
    <!-- задать вопрос -->
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          
          
          <div class="intro-lead-in">
              <h3><strong>Есть вопрос? <br> Задай его в соцсетях или <a href="#contact" class="contact-form1"><span class="orange-accent">тут</span></a></strong></h3>
              <br><br>
  
          </div>
        </div>
      </div>
    </div>


<!-- соцсети -->
    <div class="row" id="social-med">
      <div class="col-lg-12 text-center mrgn20-btm mrgn40-top">
        <div class="fadeInDown wow">
          <h2 class="section-heading">Мы В <span class="orange-accent">Соцсетях</span></h2>
        </div>
        <ul class="list-inline social-buttons">
          <li> <a class="fa fa-odnoklassniki" href="https://ok.ru"></a> </li>
          <li> <a class="fa fa-vk" href="https://vk.com"></a> </li>
          <li> <a class="fa fa-whatsapp" href="https://wa.me"></a> </li>  
        </ul>
     </div>
    </div>
   <!-- \соцсети -->       
      
  </div>
  
</section>
<!-- \контакты --> 

<?php 
get_footer();
?>