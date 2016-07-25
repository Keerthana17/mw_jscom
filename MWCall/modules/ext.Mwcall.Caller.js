( function ( mw, $ ) {
	var welcome, dayMap;

	/**
	 * Local cache of mapping date day indices to day names in English.
	 * Note that the range is 0-6, where 0 = Sunday.
	 * See also https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/Date/getDay
	 */
	//dayMap = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

	welcome = {
		init: function () {
			var $box, dNow, color;

			$box = $( '<div class="mw-example-welcome"></div>' ).append(
				$( '<h4>', {
					text: mw.user.isAnon() ?
						mw.msg( 'example-welcome-title-loggedout') :
						mw.msg( 'example-welcome-title-user', mw.user.getName() )
				} )
			);
		},
	};

	mw.libs.welcome = welcome;

}( mediaWiki, jQuery ) );
