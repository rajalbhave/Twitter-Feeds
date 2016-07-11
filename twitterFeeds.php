<?php

/* @package twitter-feeds */
/* Adds twitter feeds to the website using twitter API*/
/*
Plugin Name: Twitter Feeds
Description: Import twitter feeds
Author: Rajal Bhave
Version: 1
*/

class twitterFeeds extends WP_Widget{
	
	
	public function __construct(){
		$params = array(
		'name' => 'Twitter Feeds',
		'description' => 'Thank you for installing Twitter Feeds'
		);
		parent::__construct('twitterFeeds', '', $params);
		
	}
	


// Front-end display of widget
public function widget($args, $instance){
	extract($args);
	//var_dump($args);
	extract($instance);
	
	$title = apply_filters('widget_title', $title );
	$description = apply_filters('widget_description', $description);
	
	if(empty($title)) $title = "Twitter Feeds";
	if(empty($twitter_name)) $twitter_name = "";
	if(empty($twitter_id)) $twitter_id = "";
	if(empty($width)) $width = "300";
	if(empty($height)) $height = "350";
	
	  echo $before_widget;
            echo $before_title . $title . $after_title;
	?>
	<div >
	
		<a class="twitter-timeline" width = <?php echo $width; ?> height="<?php echo $height; ?>" 
		href="https://twitter.com/<?php echo $twitter_name;?>" data-widget-id="<?php echo $twitter_id; ?>"
	data-theme="light" data-link-color="" data-tweet-limit="2"
	<?php
			  $blank='';  
			  $head="noheader"; 
			  $foot="nofooter"; 
			  $scroll="noscrollbar";
			  $bord="noborders";
			  $bg="transparent";	
			  ?>
			  
         <?php if($border=='false')  { $bord=$borders;  } else{ $bord=$blank; } ?>   
         <?php if($tranparent=='true') { $trans=$bg;  }else{ $trans=$blank;  }?>            
              data-chrome="<?php echo $head;?> <?php echo $foot;?> <?php echo $scroll;?> <?php echo $bord;?> <?php echo $trans;?>">Tweets by <?php echo $twitter_name;?>
		</a>
	</div>
	<?php	  echo $after_widget;
 
 }
 
 
 
 //Backend form for widget
 public function form($instance){
	extract($instance);
	//widget configuration
	?>
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"> Title : </label>
		<input id="<?php echo $this->get_field_id('title'); ?>"
				name="<?php echo $this->get_field_name('title'); ?>"
				value ="<?php echo !empty($title) ?  $title : ''; ?>"
		/>
		
	</p>
	<p>
		<label for="<?php echo $this->get_field_id('twitter_name');?>"> Twitter Name : </label>
		<input id="<?php echo $this->get_field_id('twitter_name'); ?>"
				name="<?php echo $this->get_field_name('twitter_name');?>"
				value="<?php echo !empty($twitter_name) ? $twitter_name : ''; ?>" 
		/>
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id('twitter_id'); ?>"> Twitter Id : </label>
	<input id="<?php echo $this->get_field_id('twitter_id');?>"
			name="<?php echo $this->get_field_name('twitter_id'); ?>"
			value = "<?php echo !empty($twitter_id) ? $twitter_id : ''; ?>"
	/>
	</p>
	
	<p>
	<label for= "<?php echo $this->get_field_id('width'); ?>"> Width : </label>
	<input id = "<?php echo $this->get_field_id('width'); ?>"
			name="<?php echo $this->get_field_name('width'); ?>"
			value="<?php echo !empty($width) ? $width : '';?>"
			
	/>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id('height'); ?>"> Height : </label>
	<input id="<?php echo $this->get_field_id('height'); ?>"
			name="<?php echo $this->get_field_name('height');?>"
			value = "<?php echo !empty ($height) ? $height : '';?>"
	/>
	</p>
	<?php
}



} 
//register widget with WordPress
add_action('widgets_init', 'register_twitterFeeds');
function register_twitterFeeds(){
	register_widget('twitterFeeds');
}
?>