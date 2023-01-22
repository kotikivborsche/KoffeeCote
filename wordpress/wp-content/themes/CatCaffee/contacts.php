<?php get_header(); ?>
<?php
/*
Template Name: Contacts
 
*/
 
// … остальной код шаблона
?>
<!--контакты -->
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
              <h3><strong>НАШ АДРЕС: Г.БЕРЕЗНИКИ, УЛ.МИРА, Д.86<br><br>
              СВЯЗАТЬСЯ С НАМИ В РАБОЧЕЕ ВРЕМЯ МОЖНО ПО ТЕЛЕФОНУ: 
              <a href="tel:<?php the_field('main_phone') ?>"><?php the_field('main_phone') ?></a></strong></h3>
              <br><br>
              
               
              
              
          </div>
        </div>
      </div>
    </div>
 

    <!-- карты-->
    <div class="row">
    <div class="fadeInDown wow"> 
    <div class="intro-lead-in text-center">
        <h3><strong>Нас легко найти, сложно потерять и невозможно забыть</strong></h3>
        <br><br>   
    </div>
    
      <!--карта1-->
      <div class="col-sm-5 col-sm-offset-1">
        <img alt="Map1" class="img-responsive" src="<?= get_template_directory_uri();?>/images/Map1.png"> 
      </div>
      <!--\карта1-->

      
      <!-- карта2 -->
      <div class="col-sm-5">
        <img alt="Map2" class="img-responsive" src="<?= get_template_directory_uri();?>/images/Map2.png"> 
      </div>
      <!-- \карта2 -->  

    </div>
    <!-- \карты -->
    </div>
    <div class="row">
      <div class="col-lg-12 text-center mrgn20-btm mrgn80-top">
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
          
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="fadeInDown wow">
          <div class="intro-lead-in">
              <h3><strong>Есть вопрос? <br> Задай его в соцсетях или <a href="#contact" class="contact-form1"><span class="orange-accent">тут</span></a></strong></h3>
          </div>
        </div>
      </div>
    </div>
  </div> 
</section>
<!--\контакты -->
<?php get_footer(); ?>