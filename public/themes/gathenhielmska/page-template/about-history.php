<?php /* Template name: About history */ ?>

<?php get_header(); ?>

<?php 


 $icon = get_template_directory_uri().'/assets/images/';
 $wave = $icon ."waveDesktop.svg";
 $history = get_fields() ;
 
?>
<section class="history">
  <h1 class="timline_headline">Gathenhielmskas tidslinje</h1>
  <div class="timeline_desktop">  
      
  <article class="timeline" > 
          
             <?php  foreach($history as $historys =>$fullTimeline):?>
            <?php
                 //timline
                 if($historys ==='history_timeline'): 
                    $timelines = $history['history_timeline']['history_year']; 
                 ?>         
                 
                  <img src="<?php echo $fullTimeline['history_Desktop-image']?>" class="timeline__desktop-background">    
                 <div class="timeline_container">
                 
                       <?php for($t=0; $t < count($timelines); $t++):?> 
                        <?php if (in_array($t,[0,4,8,11,14])):?>
                            <div class="timeline_boxes">
                            <?php endif; ?>
                        <div class="timeline__box">
                            <?php $lineClass = ($t === 0 ?"timeline__line-first":"timeline__lines"); ?>
                            
                            <p class="timeline__year">
                                <?php echo $timelines[$t]['year'] ?>
                            </p>  
                            <div class="<?php echo $lineClass; ?>">
                                <div class="timeline___line-dot">
                                </div>
                            </div>

                                <p class="timeline__text">
                                    <?php echo $timelines[$t]['Text'] ?>
                                </p>  
                
                    </div>
                     <?php if (in_array($t,[3,7,10,13,16])):?>
                            </div>
                        <?php endif; ?>
                     <?php endfor;   ?>  
                    
                    </div>
                    <p class="timeline_moreinfo">Scrolla för att få reda på mer! <img src="<?php echo $icon."arrow_right.svg"?>" class="history___arrow-icon"></p>
              </article>
                     </div>
            <?php endif;?>
           
            <?php
            
                        
              //facts under timeline,includes images and sliders
                 if($historys ==='history_facts'):
                     $historyfacts = $history['history_facts']['textboxes_history'];       
                   
                 ?>  
             <?php for ($i=0; $i < count($historyfacts) ; $i++):?>
                
           <!--page headlines house founded and saved -->
                <?php if ($i ===0 || $i == 2):
                        $breakpoint=($i === 0) ? 1.77 :  1.712;
                        $historyClass =($i ===0)?"history_foundead": "history_saved";
                        $paragraph1 = substr($historyfacts[$i]['Text'],0,strlen($historyfacts[$i]['Text'])/$breakpoint);
                        $paragraph2 = substr($historyfacts[$i]['Text'],strlen($historyfacts[$i]['Text'])/$breakpoint,strlen($historyfacts[$i]['Text']));      
                 ?>
             <article class="history_facts <?php echo $historyClass ?>" >
                <?php if ($i === 2): ?>
                <img class="history_background-wave-desktop" src="<?php echo $wave ?>">
              
                    <?php endif; ?>
                <img src="<?php echo $historyfacts[$i]['background']?>" class="history__facts_background"?>
                     
                <div class="history_facts-content">  
                    <h2>
                        <?php echo $historyfacts[$i]['history_heading'];  ?>
                    </h2>
                            
                    <div class="history_paragraph">
                    <p>
                    <?php  echo  $paragraph1 ?>
                    </p> 
                    <div class="history_paragraph2" >
                    <p>
                        <?php echo  $paragraph2 ?>
                   </p> 
                        <p>
                            <?php echo $historyfacts[$i]['addinotal_text']; ?>
                        </p>
                        <a href="<?php echo $historyfacts[$i]['url']['url']; ?>">
                            <?php echo $historyfacts[$i]['url']['url_text'];?> <img src="<?php echo $icon."arrow_right.svg";?>" class="history___arrow-icon">
                         </a>
                    </div>
                  
                 </div>
            </div>
         </article>
        <?php endif ?> 
        <!--page headlines take part of the history-->
            <?php if($i === 1):
                 $historyClass ="history_part";
                 ?>
                    <article class="history_facts <?php echo $historyClass ?>" >
                     <h2><?php echo $historyfacts[$i]['history_heading'];  ?></h2>
                     <p>
                          <?php echo $historyfacts[$i]['Text'] ?>
                    </p>
                   <div class="history__facts_slider-container">
                        <?php foreach ($historyfacts[$i]['gallery'] as $historySlideImage):?>
                            <img src="<?php echo $historySlideImage['url']?>">
                        <?php endforeach; ?>
                     </div>
                </article>
            <?php endif; ?>
            <!--page headlines then and now -->
            <?php if($i === 3):
                 $historyClass ="history_now";
                 ?>
                    <article class="history_facts <?php echo $historyClass ?>" >
                     <h2><?php echo $historyfacts[$i]['history_heading'];  ?></h2>
                     
                   <div class="history__facts_img-container">
                      
                        <?php for ($z = 0 ; $z <4; $z++):?>
                            <?php if ($z < 2): ?>
                                <img class="history_mobile-now-img" src="<?php echo $historyfacts[$i]['gallery'][$z]['url']?>">
                            <?php endif; ?>
                            <?php if ($z>1): ?>
                                <img class="history_desktop-now-img" src="<?php echo $historyfacts[$i]['gallery'][$z]['url']?>">
                            <?php endif; ?>
                           
                        <?php endfor; ?>
                     </div>
                      <a href="<?php echo $historyfacts[$i]['url']['url']; ?>">
                            <?php echo $historyfacts[$i]['url']['url_text'];?> <img src="<?php echo $icon."arrow_right.svg";?>" class="history___arrow-icon">
                         </a>
                </article>
            <?php endif; ?>
         
           <?php endfor; ?>
                  
            
                  
            <?php endif;?>
                        
      
                    
     <?php endforeach; ?>

   
</section>


<?php get_footer(); ?>
