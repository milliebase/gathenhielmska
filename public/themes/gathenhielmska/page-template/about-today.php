<?php /* Template name: About today */ ?>
<?php $manifest = get_fields()['about_today_box']['manifest']; 
      $cultureCenter = get_fields()['about_today_box']['culture'];
      $icon = get_template_directory_uri().'/assets/images/';
?>
<?php get_header(); ?>
    <section class="about-today">
        <article class="today_manifest">
        <?php for($i = 0; $i < count($manifest); $i++): ?>
            <div class="manifest_box">
               <img class="manifest__box-background-desktop" src="<?php echo $manifest[$i]['image-desktop']['url']?>"> 
               <img class="manifest__box-background-mobile" src="<?php echo $manifest[$i]['image-mobile']['url']?>"> 
                <div class="manifest__box-text">
                <h2><?php echo $manifest[$i]['header']  ?>
                <p><?php echo $manifest[$i]['Text'] ?></p>
                </div>
            </div>
        <?php endfor; ?> 
        </article>
        <article class="today_culture">
            <?php 
              $paragraph1 = substr($cultureCenter['today_textarea'],0,strlen($cultureCenter['today_textarea'])/2.148);
              $paragraph2 =substr($cultureCenter['today_textarea'],strlen($cultureCenter['today_textarea'])/2,strlen($cultureCenter['today_textarea']));      
            ?>
            <h2 class="culture__header"><?php echo $cultureCenter['today_text-header'] ?></h2>
           <div class="culture__text-box">
            <div class="culture__paragraph">
                 <p>
                    <?php echo $paragraph1 ?>
                 </p>
            </div>
            <div class="culture__paragraph2">
            <p>
                <?php echo $paragraph2 ?>
            </p> 
                <a href="<?php echo $cultureCenter['url']?>">
                <?php echo $cultureCenter['today_text-url']?>
                <img src="<?php echo $icon."arrow_right.svg"?>" class="today___arrow-icon">
            </div>
            </div>
        </article>
    </section>
<?php  ?>
<?php get_footer(); ?>
