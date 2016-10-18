<form method="get" class="search-form" action="<?php echo esc_url(home_url()); ?>/">
	<input type="text" name="s" class="search-top" value="<?php _e('Search here..', 'nomad'); ?>" onfocus='if (this.value == "<?php _e('Search here..', 'nomad'); ?>") { this.value = ""; }' onblur='if (this.value == "") { this.value = "<?php _e('Search here..', 'nomad'); ?>"; }' />
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'nomad' ) ?>" />
</form>
