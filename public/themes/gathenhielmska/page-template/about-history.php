<?php /* Template name: About history */ ?>

<?php get_header(); ?>

<?php 


 $icon = get_template_directory_uri().'/assets/images/';
 $history = get_fields() ;
 
?>
<section class="history">
    <article class="timeline" > 
        <div class="timeline_container">
        <?php  foreach($history as $historys =>$keys):?>
            <?php
                 //timline
                 if($historys ==='history_timeline'): 
                    $timelines = $history['history_timeline']['history_year']; 
                 ?>               
                    <?php foreach ($timelines as $timeline): ?>
                     <div class="timeline_box">
                       
                        <?php $lineClass = (current($timeline)===$timelines[0]['year'])?"timeline__line-first":"timeline__lines" ?>
                        
                        <p class="timeline__year">
                            <?php echo $timeline['year'] ?>
                        </p>  
                        <div class="<?php echo $lineClass ?>">
                            <div class="timeline___line-dot">
                            </div>
                        </div>

                            <p class="timeline__text">
                                <?php echo $timeline['Text'] ?>
                            </p>  
                
                    </div>
                    <?php endforeach; ?>
                    </div>
                    <p class="timeline_moreinfo">Scrolla för att få reda på mer! <img src="<?php echo $icon."arrow_right.svg"?>" class="history___arrow-icon"></p>
              </article>
            <?php endif;?>
           
            <?php
            
                        
              //facts under timeline,includes images and sliders
                 if($historys ==='history_facts'):
                     $historyfacts = $history['history_facts']['textboxes_history'];       
                   
                 ?>  
             <?php for ($i=0; $i < count($historyfacts) ; $i++):?>
                <?php switch ($i) {
                    case 0:
                    $historyClass ="history_foundead";
                    break;
                    case 1:
                    $historyClass ="history_part";
                    break;
                    case 2:
                    $historyClass ="history_saved";
                    break;
                    case 3:
                    $historyClass ="history_now";
                    break;
                     }
                    
                ?>
                     <article class="history_facts <?php echo $historyClass ?>" >

                        <img src="<?php echo $historyfacts[$i]['background']?>" class="history__facts_background"?>
                        <div class="history_facts-content">
                            <h2><?php echo $historyfacts[$i]['history_heading'];  ?></h2>
                            <p>
                                <?php echo $historyfacts[$i]['Text']; ?>
                            </p> 
                            <!-- img slider-->
                                <?php if ($i == 1):?>
                                    <div class="history__facts_slider-container">
                                        <?php foreach ($historyfacts[$i]['gallery'] as $historySlideImage):?>
                                            <img src="<?php echo $historySlideImage['url']?>">
                                        <?php endforeach; ?>
                                    </div>
                             <?php endif; ?>
                             <!--2 images halfs-->
                             <?php if ($i == 3):?>
                                <div class="history__facts_img-container">
                                    <img src="<?php echo $historyfacts[$i]['gallery'][0]['url'] ?>">
                                    <img src="<?php echo $historyfacts[$i]['gallery'][1]['url'] ?>">
                             </div> 
                                <?php endif; ?>
                                
                            <p>
                                <?php echo $historyfacts[$i]['addinotal_text']; ?>
                            </p> 
                            <a href="<?php echo $historyfacts[$i]['url']['url']; ?>">
                                <?php echo $historyfacts[$i]['url']['url_text'];?> <img src="<?php echo $icon."arrow_right.svg"?>" class="history___arrow-icon">
                                
                            </a>
                        </div>
                    </article>
               
                <?php endfor; ?>
            
                  
            <?php endif;?>
                        
      
                    
     <?php endforeach; ?>

   
</section>


<?php //get_footer(); 


                    /**/
?>
