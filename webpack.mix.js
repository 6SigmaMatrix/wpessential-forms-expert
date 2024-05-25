const mix = require( 'laravel-mix' );
mix.setPublicPath( './' );
if ( ! mix.inProduction() )
{
	mix.js( 'src/wpessential-forms-expert.js', 'assets/js' ).vue( { version : 3 } );
	mix.version();
	mix.options( {
		processCssUrls : false, fonts : 'assets/fonts'
	} );
}

if ( mix.inProduction() )
{
	mix.minify( [ 'assets/js/wpessential-forms-expert.js' ] );
}
