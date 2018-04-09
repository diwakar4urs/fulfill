<?php 
/**
 * The template for displaying Search Form
 */
?>
<div class="tg-search">
<form class="form-search tg-search-form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
	<fieldset>
		<input type="text" class="form-control" placeholder="<?php esc_attr_e('Search','soccer-acumen');?>" value="" name="s">
		<button type="submit" class="fa fa-search"></button>
	</fieldset>
</form>
</div>
