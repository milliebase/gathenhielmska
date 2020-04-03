<?php wp_footer(); ?>
<?php $footer_imgs = get_template_directory_uri().'/assets/images'; 

?>

<footer>
    <div class="footer_container">
        <div class="footer__social">
            <img class="meh" src="<?php echo  $footer_imgs.'/logos/gathenhielmska._footer.svg'?>" alt="gathenheimska">
            <div class="footer___media">
                <a><img src="<?php echo  $footer_imgs.'/logos/facebook_footer.svg'?>"alt="facebook"></a>
                <a><img src="<?php echo  $footer_imgs.'/logos/instagram_footer.svg'?>" alt="instagram"></a>
            </div>
        </div>
      
        <div class="footer__info">
            <p>Stigbergstoget 7, Göteborg</p>
            <p>Telefon:0707 211 943</p>
            <p>Mail:info@gathenhielm.se</p>
            <p>@2020 Gathenhielmska</p>
        </div>
            
        <div class="footer__suporting">
            <p>MED STÖD FRÅN</p>
          <div class="footer__suport_box">
            <div class="footer__support_col1">
                <img src="<?php echo  $footer_imgs.'/logos/higab.svg'?>" alt="higab">
                 <img src="<?php echo  $footer_imgs.'/logos/kulturrad.svg'?>" alt="kultur rådet">
                
            </div>
            <div class="footer__support_col2">
                 <img src="<?php echo  $footer_imgs.'/logos/goteborgsstad.svg'?>" alt="västra götalandsregionen">
                <img src="<?php echo  $footer_imgs.'/logos/vastragotalandregionen.svg'?>" alt="göteborgs stad">
            </div>
        </div>
    </div>
    </div>
    <img class="footer_bird_background" src="<?php echo  $footer_imgs.'/illustrations/png_bird2.png'?>" alt="ilustartion bird">

</footer>
</body>

</html>
