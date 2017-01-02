<?php

/*

  FlatBox Theme for Question2Answer Package
  Copyright (C) 2014  Q2A Market <http://www.q2amarket.com>

  File:           inc/qam-flatbox-theme.php
  Version:        FlatBox 1.0.2
  Description:    FlatBox theme core class

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.

 */

/**
 * FlatBox theme loader class
 * 
 * This class loads all required data for the FlatBox theme. This is written more
 * for future use and to keep untouched <code>qa_html_theme_base</code>
 *
 * @package FlatBox
 * @subpackage Loader
 * @category Theme
 * @since FlatBox 1.0.0
 * @version 1.0 
 * @author Q2A Market <http://www.q2amarket.com>
 * @copyright (c) 2014, Q2A Market
 * @license http://www.gnu.org/copyleft/gpl.html
 */
class qam_flatbox_theme
{

    /**
     * @var array Holds the data
     */
    private $data;

    /**
     * FlatBox instance
     *
     * @access public
     * @since FlatBox 1.0.0
     * @version 1.0
     * 
     * @static $instance
     *      
     * @uses qam_flatbox_theme::setup_globals() Setup require globals
     * @uses qam_flatbox_theme::includes() Include require files
     * @uses qam_flatbox_theme::heads() Setup <code><head></code> elements
     * @uses qam_flatbox_theme::set_options() Setup dynamic options for FlatBox
     * @uses qam_flatbox_theme::headers() Setup header elements
     * @uses qam_flatbox_theme::footers() Setup footer elements
     * 
     * @see qam_flatbox_theme()
     * @return mixed all qam_flatbox_theme
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    public static function instance()
    {

        // Store the instance locally to avoid private static replication
        static $instance = null;

        // Only run these methods if they haven't been run previously
        if (null === $instance) {
            $instance = new qam_flatbox_theme;
            $instance->setup_globals();
            $instance->includes();
            $instance->heads();
            $instance->get_options();
            $instance->headers();
            $instance->footers();
        }

        // Always return the instance
        return $instance;
    }

    /**
     * Class construct
     */
    private function __construct()
    { /* Do nothing here */
    }

    /**
     * 
     * @param type $key
     * @return type
     */
    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * 
     * @param type $key
     * @return type
     */
    public function __get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * 
     * @param type $key
     * @param type $value
     */
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * 
     * @param type $key
     */
    public function __unset($key)
    {
        if (isset($this->data[$key])) {
            unset($this->data[$key]);
        }
    }

    /**
     * 
     * @param type $name
     * @param type $args
     * @return null
     */
    public function __call($name = '', $args = array())
    {
        unset($name, $args);
        return null;
    }

    /**
     * FlatBox theme globals
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * 
     * @author Q2A Market <www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function setup_globals()
    {
        $this->theme        = qa_opt('site_theme');
        $this->author       = $this->qam_opt('flatbox_author', 'Q2A Market');
        $this->author_url   = $this->qam_opt('flatbox_author_url', 'http://www.q2amarket.com');
        $this->version      = $this->qam_opt('flatbox_version', '1.0.1-beta');
        $this->flatbox_version = strtolower($this->theme . '-' . $this->version);
        $this->opt_prefix   = 'qam_flatbox_';

        $this->js_dir   = 'js/';
        $this->css_dir  = 'css/';
        $this->img_url  = 'images/';
        $this->icon_url = $this->img_url . 'icons/';
    }

    /**
     * Incldue require files
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * 
     * @author Q2A Market <www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function includes()
    { //do nothing now
    }

    /**
     * Require <code><head></code> elements
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return array <code>head</code> items
     * 
     * @todo Multidimensional array <code>head</code> and move all item under it
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function heads()
    {   
        $fonts                       = 'http://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic';
        $flatbox_core                = 'flatbox-core' . ( (qa_opt('site_text_direction') === 'rtl' ) ? '-rtl' : NULL ) . '.min';
        $this->data['meta_viewport'] = '<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">';
        $this->data['theme_css']     = array($fonts, $this->css_dir . $flatbox_core);
        $this->data['theme_js']      = array($this->js_dir . 'flatbox-core.min');
        $this->data['inline_css']    = $this->head_inline_css();

        return $this->data;
    }

    /**
     * Dynamic <code>CSS</code> based on options and other interaction with Q2A.
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string Dynamic <code>CSS</code> on <code>head</code>
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function head_inline_css()
    {
        $css = '<style>';

        $css .= ( (!qa_is_logged_in() ) ? '.qa-nav-user{margin:0 !important;}' : NULL );
        if (qa_request_part(1) !== qa_get_logged_in_handle()) {
            $css .= '@media (max-width: 979px){';
            $css .= 'body.qa-template-user.fixed, body[class^="qa-template-user-"].fixed, body[class*="qa-template-user-"].fixed{';
            $css .= 'padding-top: 118px !important;';
            $css .= '}';
            $css .= '}';
            $css .= '@media (max-width: 979px){body.qa-template-users.fixed{
                padding-top: 95px !important; }
            }
            @media (min-width: 980px){body.qa-template-users.fixed{
                padding-top: 105px !important;}
            }';
        }
        $css .= '</style>';

        return $css;
    }

    /**
     * Get theme options for customization.
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return array|mixed theme options value
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function get_options()
    {
        $this->data['ask_search_box_color']  = $this->qam_opt('ask_search_box_color');
        $this->data['welcome_widget_color']  = $this->qam_opt('welcome_widget_color');
        $this->data['fixed_topbar']          = (($this->qam_opt('fixed_topbar')) ? 'fixed' : NULL);
        $this->data['header_custom_content'] = $this->qam_opt('header_custom_content');
        $this->data['footer_custom_content'] = $this->qam_opt('above_footer_custom_content');

        return $this->data;
    }

    /**
     * Get header items
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return array|mixed various header items (e.g. user account, scripts)
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function headers()
    {
        $this->data['headers'] = array(
            'user_account'        => $this->user_account(),
            'user_points'         => $this->user_points(),
            'ask_button'          => $this->ask_button(),
            'fb_like_box_init'    => $this->fb_like_box_init(),
            'twitter_widget_init' => $this->twitter_widget_init(),
        );

        return $this->data;
    }

    /**
     * User account navigation item
     * 
     * This will return based on login information.
     * 
     * If user loggedIn, it will populate user avatar and account links.
     * If user is guest, it will populate login form and registration link.
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string HTML output for user account or authentication form
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function user_account()
    {
        //get loogedin user avatar
        if (qa_is_logged_in()) {
            $tobar_avatar = (QA_FINAL_EXTERNAL_USERS ?
                            qa_get_external_avatar_html(
                                    qa_get_logged_in_user_field('userid'), 
                                    52, 
                                    true
                            ) :
                            qa_get_user_avatar_html(
                                    qa_get_logged_in_user_field('flags'), 
                                    qa_get_logged_in_user_field('email'), 
                                    qa_get_logged_in_user_field('handle'), 
                                    qa_get_logged_in_user_field('avatarblobid'), 
                                    qa_get_logged_in_user_field('avatarwidth'), 
                                    qa_get_logged_in_user_field('avatarheight'), 
                                    52, 
                                    false
            ));
            
            $loggedin_avatar = (is_null($tobar_avatar) && !qa_opt('default_avatar_show') ? '<div class="qam-default-avatar"><i class="icon icon-user"></i></div>' : $tobar_avatar);
        }    

        $auth_icon = qa_is_logged_in() ? strip_tags($loggedin_avatar, '<img><div><i>') : '<i class="icon-key qam-auth-key"></i>';

        //finally return avatar with div tag
        $user_account = '<div id="qam-account-toggle" class="' .
                (qa_is_logged_in() ? 'qam-logged-in' : 'qam-logged-out') . '">'
                . '<!--Login-->' . $auth_icon . '</div>';

        return $user_account;
    }

    /**
     * Get logged in user's points
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string|null LoggedIn user's total points, null for guest
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function user_points()
    {
        if (qa_is_logged_in()) {
            $userpoints = qa_get_logged_in_points();
            $pointshtml = ($userpoints == 1) ? qa_lang_html_sub('main/1_point', '1', '1') : qa_html(number_format($userpoints));
            $points     = '<DIV CLASS="qam-logged-in-points">' . $pointshtml . '</DIV>';

            return $points;
        }

        return NULL;
    }

    /**
     * Custom ask button for medium and small screen
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string Ask button html markup
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function ask_button()
    {
        $html = '<div class="qam-ask-search-box">';
        $html .= '<div class="qam-ask-mobile"><a href="' . qa_path('ask', null, qa_path_to_root()) . '" class="' . $this->qam_opt('ask_search_box_color') . '">' . qa_lang_html('main/nav_ask') . '</a></div>';
        $html .= '<div class="qam-search-mobile ' . $this->qam_opt('ask_search_box_color') . '" id="qam-search-mobile"></div>';
        $html .= '</div>';

        return $html;
    }

    /**
     * Footer custom html/advert code for column 1 area
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string HTML markup or text
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function footer_advert()
    {
        return $this->qam_opt('footer_advert_code');
    }

    /**
     * Facebook like box requrie javascript
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string Javascript code
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function fb_like_box_init()
    {
        $fb_like_box_init = '<div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1470369946514235&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, \'script\', \'facebook-jssdk\'));</script>';

        return $fb_like_box_init;
    }

    /**
     * Facebook like box
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string Facebook like box HTML
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function fb_like_box()
    {
        $fb_like_box = '<h3 class="qam-footer-col-heading">'
                . $this->qam_lang('fb_like_box_heading') . '</h3>';
        $fb_like_box .= '<div class="fb-like-box" '
                . 'data-href="' . $this->qam_opt('facebook') . '" '
                . 'data-height="' . $this->qam_opt('fb_height') . '" data-colorscheme="dark" '
                . 'data-show-faces="true" data-header="false" '
                . 'data-stream="false" data-show-border="false"></div>';

        return $fb_like_box;
    }

    /**
     * Twitter timeline widget's requrie javascript
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string Javascript code
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function twitter_widget_init()
    {
        $twitter_widget_init = '<script>

    !function(d,s,id){

        var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';

        if(!d.getElementById(id)){

            js=d.createElement(s);
            js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js,fjs);

        }

    }(document,"script","twitter-wjs");

</script>';

        return $twitter_widget_init;
    }

    /**
     * Twitter timeline widget
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string Twitter timeline widget HTML
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function twitter_widget()
    {
        $twitter_widget = '<h3 class="qam-footer-col-heading">'
                . $this->qam_lang('twitter_heading') . '</h3>';
        $twitter_widget .= '<a class="twitter-timeline"  href="' . $this->qam_opt('twitter') . '"
            data-widget-id="' . $this->qam_opt('twitter_widget_id') . '"
            data-theme="dark" 
            data-link-color="#3498db" 
            height="' . $this->qam_opt('twitter_height') . '"
            data-chrome="noheader nofooter noborders noscrollbar transparent"            
            >Tweets by @' . $this->qam_opt('twitter_id') . '</a>';

        return $twitter_widget;
    }

    /**
     * Footer column social icons for profile link
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string Social icons HTML
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function social_icons()
    {
        $channels = array(
            'facebook',
            'twitter',
            'gplus',
            'linkedin',
            'youtube',
            'vimeo',
            'pinterest',
            'github',
            'wordpress',
        );

        // to check for -1 icon class
        $channel_one = array('facebook', 'linkedin', 'vimeo');

        $icons = '<h3 class="qam-footer-col-heading">'
                . $this->qam_lang('social_heading') . '</h3>';

        $icons .= '<ul class="qam-footer-links qam-social-links">';

        foreach ($channels as $channel)
        {
            // set icon class
            $channel_icon = (in_array($channel, $channel_one) ? $channel . '-1' : $channel);
            // assign option to variable
            $channel_url  = $this->qam_opt($channel);

            $icons .= (!empty($channel_url) ? '<li>'
                            . '<a href="' . $channel_url . '" target="_blank" '
                            . 'class="' . $channel . '">'
                            . '<i class="icon-' . $channel_icon . '"></i>'
                            . '</a>'
                            . '</li>' : NULL );
        }

        $icons .= '</ul>';

        return $icons;
    }

    /**
     * Footer four columns
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string Footer columns HTML
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function footer_columns()
    {
        $column_items = array(
            $this->footer_advert(),
            $this->fb_like_box(),
            $this->twitter_widget(),
            $this->social_icons(),
        );

        $columns = '<div class="qam-footer-row">';

        foreach ($column_items as $column_item)
        {
            $columns .= '<div class="qam-footer-col">' . $column_item . '</div>';
        }

        $columns .= '</div> <!-- END qam-footer-row -->';

        return $columns;
    }

    /**
     * Question2Answer system icons info bar
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string Info icons HTML
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function icon_info()
    {
        $icons = array(
            'answer'  => 'Answer',
            'comment' => 'Comment',
            'hide'    => 'Hide',
            'show'    => 'Show',
            'close'   => 'Close',
            'reopen'  => 'Re-Open',
            'flag'    => 'Flag',
            'unflag'  => 'Un-Flag',
            'edit'    => 'Edit',
            'delete'  => 'Delete',
            'approve' => 'Approve',
            'reject'  => 'Reject',
            'reply'   => 'Reply',
        );

        $icons_info = '<div class="qam-icons-info">';

        foreach ($icons as $icon => $label)
        {
            $icons_info .= '<div class="qam-icon-item"><span class="' . $icon . '"></span> ' . $label . '</div>';
        }
        $icons_info .= '</div> <!-- END qam-icons-info -->';

        return $icons_info;
    }

    /**
     * FlatBox theme developer's footer credit
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return string HTML for credits
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function credits()
    {
        $credits = '<div class="qam-attribution">' . $this->theme .
                ' Theme by <a href="' . $this->author_url . '">' . $this->author .
                '</a></div>';
        return $credits;
    }

    /**
     * Footer various elements for the theme
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return array Various elements
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function footers()
    {
        $this->data['footers'] = array(
            'footer_columns' => $this->footer_columns(),
            'credits'        => $this->credits(),
            'icons_info'     => $this->icon_info(),
        );
    }

    /**
     * Get FlatBox language string
     * 
     * The method can be used only within the class
     * Due to some limitation, I have to write this method for the class
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @param string $lang Language key
     * @return string Language parser
     * 
     * @todo Probably will remove this method or call it in function
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    public function qam_lang($lang)
    {
        return qa_lang_html('qam_flatbox_theme_lang/' . $lang);
    }

    /**
     * Get or set FlatBox theme option 
     * 
     * The method can be used only within the class
     * Due to some limitation, I have to write this method for the class
     *
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @param string $name option key
     * @param mixed $value option value
     * @return mixed option key output
     * 
     * @todo Probably will remove this method or call it in function
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    public function qam_opt($name, $value = NULL)
    {
        return qa_opt($this->opt_prefix . $name, $value);
    }

}

/* ---------------------------------------------------------------------------- */

// create a function to instanciate the class
if (!function_exists('qam_flatbox_theme')) {

    /**
     * Return <code>qam_flatbox_theme</code> class instance
     *
     * @access public
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return array
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    function qam_flatbox_theme()
    {
        return qam_flatbox_theme::instance();
    }

}

// Declare global variable
if (class_exists('qam_flatbox_theme')) {
    $GLOBALS['flatbox'] = qam_flatbox_theme();
}

// End of qam-flatbox-theme.php