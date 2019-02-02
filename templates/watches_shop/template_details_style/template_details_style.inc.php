<?php 

$templateparams = $app->getTemplate(true)->params;

$Section_class = array("header","central_content","footer");

$header_levels = array("h1","h2","h3","h4","h5","h6"); 

$count_meni = array(1,2,3,4,5); 

$count_type_buttons = array(1,2,3); 

?>

<style>


body {
    font-family:"<?php echo $this->params->get('body_font', 'PT Sans Narrow') ?>";
    background-color:<?php echo $this->params->get('body_color')?>;


	<?php if 
	($this->params->get('body_custom_bg_file')=="")
	{
	?>

    background-image: url('<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/<?php echo $this->params->get('body_background')?>');

	<?php } ?>


	<?php if 
	($this->params->get('body_custom_bg_file')!="")
	{
	?>
	/*custom bg images*/
	background-image: url("<?php echo $this->baseurl ?>/<?php echo $this->params->get('body_custom_bg_file')?>");
	<?php } ?>

    background-size: <?php echo $this->params->get('body_bg_size')?>;
    background-repeat: <?php echo $this->params->get('body_bg_repeat')?> ;
    background-attachment: <?php echo $this->params->get('body_bg_attachment')?> ;
    color: <?php echo $this->params->get('body_text_color')?>;
}

a {
    color:<?php echo $this->params->get('body_link_color')?>;
    text-decoration:<?php echo $this->params->get('body_underline', 'underline')?>;
    font-family:"<?php echo $this->params->get('links_font', 'PT Sans Narrow')?>";
}
a:hover {
    color:<?php echo $this->params->get('body_link_hover_color')?>;
    text-decoration:<?php echo $this->params->get('body_hover_underline')?>;
}


<?php foreach ($header_levels as $key=>$body_header_levels): ?>

<?php 
	$font_family = 'body_'.$body_header_levels . '_font';
	$color = 'body_'.$body_header_levels . '_color';
	$font_size =  'body_'.$body_header_levels . '_size';
	$font_weight = 'body_'.$body_header_levels . '_font_weight';
	$text_transform = 'body_'.$body_header_levels . '_text_transform';
?>

<?php echo "$body_header_levels"; ?> {
	font-family:"<?php echo $this->params->get($font_family , 'PT Sans Narrow')?>";
	color:<?php echo $this->params->get($color)?>;
	font-size: <?php echo $this->params->get($font_size)?>px;
	font-weight: <?php echo $this->params->get($font_weight)?>;
	text-transform: <?php echo $this->params->get($text_transform)?>;
}

<?php endforeach; ?>




<?php foreach ($Section_class as $key=>$section_class): ?>


<?php 

	$expand_section_bg = 'expand_' . $section_class . '_bg';
	$expand_section_font = 'expand_' . $section_class . '_font';
	$expand_section_links = 'expand_' . $section_class . '_links';

	$section_color = $section_class . '_color';
	$section_background = $section_class . '_background';
	$section_custom_bg_file = $section_class . '_custom_bg_file';
	$section_bg_size = $section_class . '_bg_size';
	$section_bg_repeat = $section_class . '_bg_repeat';
	$section_bg_attachment = $section_class . '_bg_attachment';

	$section_text_color = $section_class . '_text_color';
	$section_font = $section_class . '_font';
	$section_links_font = $section_class . '_link_font';

	$section_link_color = $section_class . '_link_color';
	$section_underline =  $section_class . '_underline';
	$section_link_hover_color =  $section_class . '_link_hover_color';
	$section_hover_underline =  $section_class . '_hover_underline';

?>

       .<?php echo "$section_class"; ?>{

       	<?php if ($this->params->get($expand_section_bg)==1): ?>
	       	background-color:<?php echo $this->params->get($section_color)?>;

			<?php if ($this->params->get($section_custom_bg_file)==""): ?>

		       	background-image: url('<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/<?php echo $this->params->get($section_background)?>');

	       	<?php else: ?>

		       	background-image: url("<?php echo $this->baseurl ?>/<?php echo $this->params->get($section_custom_bg_file)?>");

	       	<?php endif; ?>

	       	background-size: <?php echo $this->params->get($section_bg_size)?>;
		    background-repeat: <?php echo $this->params->get($section_bg_repeat)?> ;
		    background-attachment: <?php echo $this->params->get($section_bg_attachment)?> ;

	    <?php endif; ?>

		<?php if ($this->params->get($expand_section_font)==1): ?>
		    color: <?php echo $this->params->get($section_text_color)?>;
		    font-family:"<?php echo $this->params->get($section_font, 'PT Sans Narrow') ?>";
	    <?php endif; ?>

       }

		<?php if ($this->params->get($expand_section_font)==1): ?>

			.<?php echo "$section_class"; ?> a {
			font-family:"<?php echo $this->params->get($header_links_font, 'PT Sans Narrow')?>";
			}

		<?php endif; ?>

		<?php if ($this->params->get($expand_section_links)==1): ?>
			.<?php echo "$section_class"; ?> a {
			color:<?php echo $this->params->get($section_link_color)?>;
			text-decoration:<?php echo $this->params->get($section_underline, 'underline')?>;
			}
			.<?php echo "$section_class"; ?> a:hover {
			color:<?php echo $this->params->get($section_link_hover_color)?>;
			text-decoration:<?php echo $this->params->get($section_hover_underline)?>;
			}
		<?php endif; ?>

		<?php foreach ($header_levels as $key=>$section_header_levels): ?>

			<?php 
			$expand_header_elem = 'expand_' . $section_class .'_'. $section_header_levels;
			$header_elem_color =   $section_class .  '_' . $section_header_levels . '_color';
			$header_elem_font_size =  $section_class .  '_' . $section_header_levels . '_size';
			?>

			<?php if ($this->params->get($expand_header_elem)==1): ?>
				.<?php echo "$section_class"; ?> <?php echo "$section_header_levels"; ?> {
				font-size:<?php echo $this->params->get($header_elem_font_size)?>px;
				color:<?php echo $this->params->get($header_elem_color )?>;
				}
			<?php endif; ?>

		<?php endforeach; ?>

<?php endforeach; ?>



<?php foreach ($count_meni as $key=>$count_meni): ?>

<?php 
	$menu_class = 'custom_menu_' . $count_meni . '_class';
	$expand_meni= 'expand_custom_meni_' . $count_meni  ;
	$menu_bg_color = 'custom_menu_' .$count_meni.'_bg_color';	
	$menu_submenu_bg_color ='custom_menu_' .$count_meni. '_submenu_bg_color';
	$menu_item_hover_bg_color ='custom_menu_' . $count_meni . '_item_hover_bg_color';
	$menu_color = 'custom_menu_' . $count_meni . '_color';
	$menu_underline = 'custom_menu_' . $count_meni . '_underline';
	$menu_font = 'custom_menu_' . $count_meni . '_font';
	$menu_hover_color = 'custom_menu_' . $count_meni . '_hover_color';	
	$menu_hover_underline ='custom_menu_' . $count_meni . '_hover_underline';
?>


<?php if 
	($this->params->get($menu_class)!="" && $this->params->get($expand_meni)!="0" ):?>


	.menu<?php echo $this->params->get($menu_class)?>{
		background-color: <?php echo $this->params->get($menu_bg_color)?>;
	}

	.menu<?php echo $this->params->get($menu_class)?>.nav li.parent ul{
		background-color: <?php echo $this->params->get($menu_submenu_bg_color)?>;
	}

	.menu<?php echo $this->params->get($menu_class)?> li a:hover{
		background-color: <?php echo $this->params->get($menu_item_hover_bg_color)?>;
	}

	.menu<?php echo $this->params->get($menu_class)?> li a {
		color:<?php echo $this->params->get($menu_color)?>;
		text-decoration:<?php echo $this->params->get($menu_underline, 'underline')?>;
		font-family:"<?php echo $this->params->get($menu_font, 'PT Sans Narrow')?>";
	}

	.menu<?php echo $this->params->get($menu_class)?> li a:hover {
		color:<?php echo $this->params->get($menu_hover_color)?>;
		text-decoration:<?php echo $this->params->get($menu_hover_underline)?>;
	}

<?php endif; ?>
<?php endforeach; ?>



<?php  ?>

.soc_icons_box ul li a {
	font-size:<?php echo $this->params->get('soc_icons_size')?>px;
}


<?php foreach ($count_type_buttons as $key=>$count_type_buttons): ?>

<?php 
	$button_selector = 'button_' .$count_type_buttons. '_selector';
	$expand_button = 'expand_button_' .$count_type_buttons;

	$button_bg_color = 'button_' .$count_type_buttons. '_bg_color';

	$button_font =  'button_'.$count_type_buttons.'_font';
	$button_text_color = 'button_' .$count_type_buttons. '_text_color';
	$button_font_size =  'button_'.$count_type_buttons.'_font_size';
	$button_line_height = 'button_'.$count_type_buttons. '_line_height';
	$button_font_weight = 'button_' .$count_type_buttons.'_font_weight';
	$button_text_transform = 'button_' .$count_type_buttons. '_text_transform';

	$expand_button_text_shadow = 'expand_button_' .$count_type_buttons. '_text_shadow';
	$button_text_shadow_color = 'button_' .$count_type_buttons. '_text_shadow_color';
	$button_text_shadow_x= 'button_' .$count_type_buttons. '_text_shadow_x';
	$button_text_shadow_y = 'button_' .$count_type_buttons. '_text_shadow_y';
	$button_text_shadow_blur = 'button_' .$count_type_buttons. '_text_shadow_blur';

	$button_padding_top = 'button_' .$count_type_buttons. '_padding_top';
	$button_padding_right = 'button_' .$count_type_buttons. '_padding_right';
	$button_padding_bottom = 'button_' .$count_type_buttons. '_padding_bottom';
	$button_padding_left = 'button_' .$count_type_buttons. '_padding_left';

	$expand_button_box_shadow = 'expand_button_' .$count_type_buttons. '_box_shadow';
	$button_box_shadow_color = 'button_' .$count_type_buttons. '_box_shadow_color';
	$button_box_shadow_x = 'button_' .$count_type_buttons. '_box_shadow_x';
    $button_box_shadow_y = 'button_' .$count_type_buttons. '_box_shadow_y';
    $button_box_shadow_blur = 'button_' .$count_type_buttons. '_box_shadow_blur';
    $button_box_shadow_spread = 'button_' .$count_type_buttons. '_box_shadow_spread';
    $button_box_shadow_type = 'button_' .$count_type_buttons. '_box_shadow_type';

    $button_border_radius = 'button_' .$count_type_buttons. '_border_radius';
    $button_border_width = 'button_' .$count_type_buttons. '_border_width';
    $button_border_color = 'button_' .$count_type_buttons. '_border_color';
    $button_border_style = 'button_' .$count_type_buttons. '_border_style';

    $button_hover_bg_color = 'button_' .$count_type_buttons. '_hover_bg_color';
    $button_hover_border_color = 'button_' .$count_type_buttons. '_hover_border_color';
    $button_hover_text_color = 'button_' .$count_type_buttons. '_hover_text_color';
?>


<?php if 
	($this->params->get($button_selector)!="" &&  $this->params->get($expand_button)!="0" )
	{
 ?>

 /*button Begin */

<?php
	$selectors = explode(",", $this->params->get($button_selector)); 
	
	for ($i = 0; $i < count($selectors); $i++) {
		if ($i != count($selectors) - 1) echo trim($selectors[$i]) . ",\n";
		else echo trim($selectors[$i]);
	}

?>
{
	background: <?php echo $this->params->get($button_bg_color)?>;
	color: <?php echo $this->params->get($button_text_color)?>;
	font-family:"<?php echo $this->params->get($button_font, 'PT Sans Narrow')?>";
	font-size:<?php echo $this->params->get($button_font_size)?>px;
	line-height: <?php echo $this->params->get($button_line_height)?>px;
	font-weight: <?php echo $this->params->get($button_font_weight)?>;


	<?php if 
	($this->params->get($expand_button_text_shadow)=="1")
	{
	?>

	    <?php
		$button_text_shadow = $this->params->get($button_text_shadow_x) . "px " . 
		$this->params->get($button_text_shadow_y) . "px " .
		$this->params->get($button_text_shadow_blur) . "px " .
		$this->params->get($button_text_shadow_color)
		?>
		text-shadow: <?php echo "$button_text_shadow";  ?>;
    
	<?php }  else { ?>

		text-shadow: none; 

	<?php } ?>

	text-transform: <?php echo $this->params->get($button_text_transform)?> ;
	padding: <?php echo $this->params->get($button_padding_top)?>px <?php echo $this->params->get($button_padding_right)?>px <?php echo $this->params->get($button_padding_bottom)?>px  <?php echo $this->params->get($button_padding_left)?>px;

	-webkit-border-radius: <?php echo $this->params->get($button_border_radius)?>px;
	-moz-border-radius: <?php echo $this->params->get($button_border_radius)?>px;
	-o-border-radius: <?php echo $this->params->get($button_border_radius)?>px;
	border-radius: <?php echo $this->params->get($button_border_radius)?>px;

	border-width: <?php echo $this->params->get($button_border_width)?>px ;
	border-color: <?php echo $this->params->get($button_border_color)?> ;
	border-style: <?php echo $this->params->get($button_border_style)?> ;

	<?php if ($this->params->get($expand_button_box_shadow)==1): ?>

	<?php
	$button_box_shadow = $this->params->get($button_box_shadow_x) . "px " . $this->params->get($button_box_shadow_y) . "px " .$this->params->get($button_box_shadow_blur) . "px " .$this->params->get($button_box_shadow_spread) . "px " .$this->params->get($button_box_shadow_color) . " " .$this->params->get($button_box_shadow_type);
	?>

	<?php else: ?>

	<?php
	$button_box_shadow = "none";
	?>

	<?php endif; ?>

	-webkit-box-shadow: <?php echo "$button_box_shadow";  ?>;
	-moz-box-shadow: <?php echo "$button_box_shadow";  ?>;
	-o-box-shadow: <?php echo "$button_box_shadow";  ?>;
	box-shadow: <?php echo "$button_box_shadow";  ?>;

	-webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}


<?php
	$selectors = explode(",", $this->params->get($button_selector)); 

	for ($i = 0; $i < count($selectors); $i++) {
		if ($i != count($selectors) - 1) echo trim($selectors[$i]) . ":hover,\n";
		else echo trim($selectors[$i]) . ":hover\n";
	}
?>
{
	background: <?php echo $this->params->get($button_hover_bg_color)?> ;
	border-color: <?php echo $this->params->get($button_hover_border_color)?>;
	color: <?php echo $this->params->get($button_hover_text_color)?> ;
}

/*button end */

<?php } ?>

<?php endforeach; ?>

</style>
