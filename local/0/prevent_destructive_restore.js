M.local_psu_mod = {

    Y: null,

	re_dropdown: null,

	gr_dropdown: null,

    init: function(Y) {
        this.Y = Y;
		this.re_dropdown = Y.one('#id_setting_course_keep_roles_and_enrolments');
		this.gr_dropdown = Y.one('#id_setting_course_keep_groups_and_groupings');
		this.re_fitem = Y.one('#fitem_id_setting_course_keep_roles_and_enrolments');
		this.gr_fitem = Y.one('#fitem_id_setting_course_keep_groups_and_groupings');
		this.oc_fitem = Y.one('#fitem_id_setting_course_overwrite_conf');

		if( this.re_dropdown ) {
			M.local_psu_mod.toggle_select( this.re_dropdown );
			M.local_psu_mod.hide_select( this.re_fitem );
		}
		if( this.gr_dropdown ) {
			M.local_psu_mod.toggle_select( this.gr_dropdown );
			M.local_psu_mod.hide_select( this.gr_fitem );
		}
		if( this.oc_fitem ) {
			M.local_psu_mod.hide_select( this.oc_fitem );
		}

    },

	toggle_select: function( to_toggle ) {
		Y = this.Y;
		console.log(to_toggle.get('id'));
		to_toggle.get('options').each(function(){
			var selected = this.get('selected');

			if( selected ) {
				Y.one('#' + to_toggle.get('id') + ' > option').set('selected', NULL);
			}else {
				Y.one('#' + to_toggle.get('id') + ' > option').set('selected','selected');
			}
		});
	},

	hide_select: function( to_hide ){
		Y = this.Y;
		Y.one('#' + to_hide.get('id')).hide();
	}
}
