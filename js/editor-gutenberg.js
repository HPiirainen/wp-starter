wp.domReady(function() {

	unregisterStyles( 'core/button', ['outline', 'squared'] );
	unregisterStyles( 'core/pullquote', ['solid-color'] );
	unregisterStyles( 'core/quote', ['large'] );
	unregisterStyles( 'core/separator', ['dots', 'wide'] );
	unregisterStyles( 'core/table', ['stripes'] );
	
	// Add custom block styles
	/*
	wp.blocks.registerBlockStyle( 'core/paragraph', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'lead',
			label: 'Lead',
		},
	] );
	*/

});

function unregisterStyles( block, styles ) {
	_.forEach(styles, function(style) {
		wp.blocks.unregisterBlockStyle( block, style );
	});
}
