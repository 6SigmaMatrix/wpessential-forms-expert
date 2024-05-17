const mix = require( 'laravel-mix' );
mix.setPublicPath( './' );
if ( ! mix.inProduction() )
{
	mix.js( 'src/wpessential-subscribers.js', 'assets/js' ).vue( { version : 3 } );
	mix.sourceMaps( true, 'source-map' );
	mix.version();
	mix.options( {
		processCssUrls : false, fonts : 'assets/fonts'
	} );
}

if ( mix.inProduction() )
{
	mix.minify( [ 'assets/js/wpessential-subscribers.js' ] );
}
