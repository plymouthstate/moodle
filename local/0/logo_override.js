M.logo_override = {

	Y: null,

	init: function(Y) {
		this.Y = Y;
		Y.one('#headerinner a').set('href', 'http://www.plymouth.edu');
		Y.one('#headerinner a').set('target', '_blank');
	},
}
