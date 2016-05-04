<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group input-group-lg search">

		<input type="text" class="form-control" placeholder="<?php echo esc_attr_x( 'Procurar', 'placeholder' , 'flatter' ) ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'flatter'  ) ?>" />
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
		</span>	
	</div>
</form>