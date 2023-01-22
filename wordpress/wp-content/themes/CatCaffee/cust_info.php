<?php get_header(); ?>
<?php
/*
Template Name: Cust
 
*/
 
// … остальной код шаблона
?>

<!-- правила -->
<section class="bg-dark0est-gray" id="Rules">
  <div class="container"> 

    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading">Наши <span class="orange-accent">Правила</span></h2>
          <h3 class="section-subheading">Правила посещения Котокафе</h3>
        </div>
      </div>
    </div>
  
    
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

<!-- цены -->
<section class="bg-darkest-gray" id="weeklyspecials">
    <div class="container">
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
    </div>
</section>
<!-- \цены -->
<!-- бронирование -->
<section class="bg-darkest-gray" id="booking">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading">Забронировать <span class="orange-accent">посещение</span></h2>
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
<!-- \забронировать -->
<!-- документы -->
<section class="bg-darkest-gray" id="Rules">
  <div class="container"> 
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading">Наши <span class="orange-accent">документы</span></h2>
          <h3 class="section-subheading">У нас все законно!</h3>
        </div>
      </div>
    </div>
    
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
                <strong>KoffeeCote</strong> - законное предприятие, соответствующее всем необходимым стандартам качества. 
                Мы любим наших котов, поэтому каждый из них проходит регулярные осмотры у ветеринара и обязательную вакцинацию.
                Усы, лапы и хвост - документы каждого уважающего себя (а они все такие, поверьте) котика, а наши документы представлены ниже.
                <div class="row">
                        <div class="col-lg-12 ">
                            <!-- Panel Group -->
                            <div class="panel-group panel-docs">
                              <div class="col-md-2 ">
                              <div class="panel panel-default panel-doc">
<a href="<?= get_template_directory_uri();?>/documents/fake.pdf"><img src="<?= get_template_directory_uri();?>/images/pdf.png"></a>
<div class="panel-doc-t">Лицензия котокафе</div>
                              </div>
                              </div>
                              <div class="col-md-2 ">
                              <div class="panel panel-default panel-doc">
<a href="<?= get_template_directory_uri();?>/documents/fake.pdf"><img src="<?= get_template_directory_uri();?>/images/pdf.png"></a>
<div class="panel-doc-t">О вакцинации котов</div>
                              </div>
                              </div>
                              <div class="col-md-2 ">
                              <div class="panel panel-default panel-doc">
<a href="<?= get_template_directory_uri();?>/documents/fake.pdf"><img src="<?= get_template_directory_uri();?>/images/pdf.png"></a>
<div class="panel-doc-t">Об вет. осмотрах</div>
                              </div>
                              </div>
                              <div class="col-md-2 ">
                              <div class="panel panel-default panel-doc">
<a href="<?= get_template_directory_uri();?>/documents/fake.pdf"><img src="<?= get_template_directory_uri();?>/images/pdf.png"></a>
<div class="panel-doc-t">Контроль качества услуг</div>
                              </div>
                              </div>
                              <div class="col-md-2 ">
                              <div class="panel panel-default panel-doc">
<a href="<?= get_template_directory_uri();?>/documents/fake.pdf"><img src="<?= get_template_directory_uri();?>/images/pdf.png"></a>
<div class="panel-doc-t">САНПИН сертификат</div>
                              </div>
                              </div>
                              <div class="col-md-2 ">
                              <div class="panel panel-default panel-doc">
<a href="<?= get_template_directory_uri();?>/documents/fake.pdf"><img src="<?= get_template_directory_uri();?>/images/pdf.png"></a>
<div class="panel-doc-t">Налоговая декларация</div>
                              </div>
                              </div>

                            </div>
                        </div>
                    </div>
        




          </p></div>
        </div>
      </div>
      
    </div>
    
    
  </div>
 
</section>
<!-- \документы -->


<!-- FAQ -->
<section class="bg-darkest-gray" id="FAQ">
  <div class="container"> 
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <h2 class="section-heading">Вопрос-<span class="orange-accent">Ответ</span></h2>
          <h3 class="section-subheading">Что вас интересует?</h3>
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
    <!--\усы --> 
    
    <div class="fadeInUp wow">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
          <div class="weeklyspecials-bg">
            <p>

            <?php
            global $post;
            $myposts = get_posts([
                'numberposts' => 100,
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
 Не нашли ответ на свой вопрос? Тогда можете задать свой вопрос в наших <a href="/wordpress/#social-med"><strong>соцсетях</strong></a> или <a href="#contact" class="contact-form1"><strong>тут</strong></a>.
 <br><br>
        Если вы не прошли мимо и спасли бездомное животное, найти подробную инструкцию, что делать, можно <a href="https://vk.com/topic-129363778_34613108"><strong>здесь</strong></a>
        </p>
        
        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- \FAQ  -->
<?php get_footer(); ?>