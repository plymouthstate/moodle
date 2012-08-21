<?PHP

class block_psu_blog_roll extends block_base {
    function init() {
        $this->title = get_string('pluginname', 'block_psu_blog_roll');
    }

    function get_content() {
        global $CFG, $USER, $SESSION, $COURSE, $PAGE;

        if($this->content !== NULL) {
            return $this->content;
        }


        // $options->noclean = true;    // Don't clean Javascripts etc
        
        $this->content = new stdClass;
        $this->content->footer = '';
        $this->content->text = '';

		$context = get_context_instance(CONTEXT_COURSE, $COURSE->id);

		foreach( get_enrolled_users( $context ) as $userid => $user ) {
			if( strlen($user->url) > 0 ) {
				if( !strstr( $user->url, 'http') ) {
					$user->url = 'http://'.$user->url;
				}//end if

				$site = file_get_contents( $user->url );
				preg_match( "/\<title\>(.*)\<\/title\>/", $site, $title );
				$this->content->text .= '<a href="'.$user->url.'" target="_blank">'.($title[1]?:$user->username).'</a><br />';
			}//end if

		}//end foreach

        return $this->content;
    }


}

?>
