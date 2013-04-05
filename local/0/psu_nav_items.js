M.psu_nav_items = {

	Y: null,

	init: function(Y) {
		this.Y = Y;
		if( Y.one('.block_navigation') ) {
			Y.one('.block_navigation ul.block_tree li p.tree_item').append('<p class="tree_item branch navigation_node"><a title="myPlymouth" href="https://my.plymouth.edu" target="_blank">myPlymouth</a></p><p class="tree_item branch navigation_node"><a title="Plymouth.edu" href="http://www.plymouth.edu" target="_blank">Plymouth.edu</a></p>');
		}//end if
	}//end init function
}
