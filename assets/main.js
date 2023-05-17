// Webpack Imports
import 'bootstrap';


( function ( $ ) {
	'use strict';

	// Focus input if Searchform is empty
	$( '.search-form' ).on( 'submit', function ( e ) {
		var search = $( this ).find( 'input' );
		if ( search.val().length < 1 ) {
			e.preventDefault();
			search.trigger( 'focus' );
		}
	} );

}( jQuery ) );
