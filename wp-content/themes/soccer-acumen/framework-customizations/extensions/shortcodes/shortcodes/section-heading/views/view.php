<?php if (!defined('FW')) die( 'Forbidden' );
/**
 * @var $atts
 */
?>

<?php if ( !empty($atts['heading']) || !empty($atts['description'])) { ?>
<div class="col-sm-8 col-sm-offset-2 col-xs-12">
	<div class="tg-section-head tg-haslayout">
		<?php if (isset($atts['heading']) && !empty($atts['heading'])) { ?>
		<div class="tg-section-heading tg-haslayout">
			<h2><?php echo esc_attr($atts['heading']); ?></h2>
		</div>
		<?php } ?>
		<?php if (isset($atts['description']) && !empty($atts['description'])) { ?>
			<div class="tg-description tg-haslayout">
				<p><?php echo esc_attr($atts['description']); ?></p>
			</div>
		<?php } ?>
	</div>
</div>
<?php } ?>	