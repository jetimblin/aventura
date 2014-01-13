<article<?php print $attributes; ?>>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page && $title): ?>
  <header>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
  </header>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  
  <div<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']); 
    ?>
            
  <?php print render($content['field_image']);  ?>

  <?php if ($display_submitted): ?>
    <footer class="submitted tags"><p class="small-text"><strong><?php print t('Posted by'); ?> <?php print $name; ?> <?php print t('on'); ?> <?php print (format_date($node->created, 'custom', 'M j, Y')); ?> <?php empty($content['field_tags']) ? print t('') : print t('under'); ?> <?php print render($content['field_tags']); ?></strong></p> 
        </footer>
      <?php endif; ?>  

       <?php print render($content['body']);  ?>
       
       <?php
         $block = block_load('easy_social', 'easy_social_block_1');
         $render_array = _block_get_renderable_array(_block_render_blocks(array($block)));
         print render($render_array);
       ?>
       
       <footer class="author">
	       <?php
	         $view = views_get_view('about_the_author');
	         $view->set_display('block'); 
	         $view->set_arguments(FALSE); ?>
	         <h2><?php print $view->get_title(); ?></h2>
	        <?php print $view->preview('block'); ?>
        </footer>
  </div>
  
  <div class="clearfix">
    <?php print render($content['comments']); ?>
  </div>
  
</article>