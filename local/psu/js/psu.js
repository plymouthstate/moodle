M.local_psu = {};

M.local_psu.init = function(Y){
		this.Y = Y;
		this.re_dropdown = Y.one('#id_setting_course_keep_roles_and_enrolments');
		this.gr_dropdown = Y.one('#id_setting_course_keep_groups_and_groupings');
		this.re_fitem = Y.one('#fitem_id_setting_course_keep_roles_and_enrolments');
		this.gr_fitem = Y.one('#fitem_id_setting_course_keep_groups_and_groupings');
		this.oc_fitem = Y.one('#fitem_id_setting_course_overwrite_conf');

		if( this.re_dropdown ) {
			M.local_psu.toggle_select( this.re_dropdown );
			M.local_psu.hide_select( this.re_fitem );
		}
		if( this.gr_dropdown ) {
			M.local_psu.toggle_select( this.gr_dropdown );
			M.local_psu.hide_select( this.gr_fitem );
		}
		if( this.oc_fitem ) {
			M.local_psu.hide_select( this.oc_fitem );
		}
};

M.local_psu.hide_select = function( to_hide ){
		Y = this.Y;
		Y.one('#' + to_hide.get('id')).hide();
};

M.local_psu.toggle_assignment_sendnotification = function(Y) {
	this.Y = Y;
	this.notify_graders_select = Y.one('#id_sendnotifications');
	if( this.notify_graders_select ) {
		M.local_psu.toggle_select( this.notify_graders_select );
	}
};

M.local_psu.toggle_select = function( to_toggle ) {
		Y = this.Y;
		to_toggle.get('options').each(function(){
			var selected = this.get('selected');

			if( selected ) {
				Y.one('#' + to_toggle.get('id') + ' > option').set('selected', null);
			}else {
				Y.one('#' + to_toggle.get('id') + ' > option').set('selected','selected');
			}
		});
};
