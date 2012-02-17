M.alter_guest_policy = {

	Y: null,
	pageid: null,

	init: function(Y) {
		this.Y = Y;
		this.pageid = Y.one('body').get('id');

		if( this.pageid == 'page-user-policy' ) {
			M.alter_guest_policy.mod_buttons( this.pageid );
		}
	},

	mod_buttons: function( pageid ) {
		Y = this.Y;
		Y.one('.noticebox').setStyle('visibility', 'hidden');
		Y.one('.noticebox').setStyle('display', 'none');
		var notice_msg = Y.one('#notice p');
		notice_msg.set('text', 'Moodle has recognized you as a guest. If this is correct, select the “Continue as Guest” button.');
		var el = Y.Node.create('<p>If you are a PSU user, select the “Login” button to enter your username and password.</p>');
		el.appendTo(notice_msg);

		Y.all('#notice .buttons form').each( function() {
			if( this.get('action').indexOf('policy.php') != -1 ) {
				this.one('input').set('value', 'Continue as Guest');
			} else {
				this.set('action', '/webapp/courses2/login/index.php');
				this.one('input').set('value', 'Login');
			}
		});
	}
}
