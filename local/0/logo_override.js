M.logo_override = {

	Y: null,

	init: function(Y) {
		this.Y = Y;
		if( Y.one('#headerinner a') ) {
			Y.one('#headerinner a').set('href', 'http://www.plymouth.edu');
			Y.one('#headerinner a').set('target', '_blank');
		}
	}
}
