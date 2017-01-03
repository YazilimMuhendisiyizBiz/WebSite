<?php

/*

  FlatBox Theme for Question2Answer Package
  Copyright (C) 2014  Q2A Market <http://www.q2amarket.com>

  File:           qa-theme.php
  Version:        FlatBox 1.0.2
  Description:    Q2A theme class

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
 * FlatBox theme extends
 * 
 * Extends the core theme class <code>qa_html_theme_base</code>
 *
 * @package qa_html_theme_base
 * @subpackage qa_html_theme
 * @category Theme
 * @since FlatBox 1.0.0
 * @version 1.4
 * @author Q2A Market <http://www.q2amarket.com>
 * @copyright (c) 2014, Q2A Market
 * @license http://www.gnu.org/copyleft/gpl.html
 */
class qa_html_theme extends qa_html_theme_base
{

    /**
     * @access public
     * @since FlatBox 1.0.0
     * @param type $template
     * @param type $content
     * @param type $rooturl
     * @param type $request
     */
    function __construct($template, $content, $rooturl, $request)
    {
        parent::__construct($template, $content, $rooturl, $request);

        /**
         * Below condition only loads the require class if Q2A set
         * the FlatBox theme as site theme.
         * 
         * Since this file is for FlatBox theme itself so it may not require
         * but still just to cross check once before load files
         * 
         * TO DEVELOPERS
         * -------------
         * If you change the theme name from `FlatBox` to anything, make sure to 
         * change in below condition
         */
        if (qa_opt('site_theme') === 'FlatBox') {
            require_once('inc/qam-flatbox-theme.php');
            require_once ('inc/qam-flatbox-functions.php');
        }
    }

    /**
     * Adding aditional meta for responsive design
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global type $flatbox
     */
    function head_metas()
    {
        global $flatbox;

        qa_html_theme_base::head_metas();
        $this->output($flatbox->meta_viewport); // add meta tag for mobiles
    }

    /**
     * Adding theme stylesheets
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global type $flatbox
     */
    function head_css()
    {
        global $flatbox;

        // get theme css files
        $styles = $flatbox->theme_css;

        foreach ($styles as $style)
        {            
            $rooturl = (strpos($style, 'Ubuntu') ? NULL : $this->rooturl);
            $this->content['css_src'][] = $rooturl . $style . '.css?' . $flatbox->flatbox_version;
        }
        qa_html_theme_base::head_css();

        $this->output($flatbox->inline_css);
    }

    /**
     * Adding theme javascripts
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global array $flatbox
     */
    function head_script()
    {
        global $flatbox;

        $scripts = $flatbox->theme_js;

        /**
         * I found this is the perfect way to add js files.
         * 
         * Since I wrote the article for it (http://goo.gl/7KFipJ), 
         * which now I need to modify based on this code. 
         * I hope to get time soon to modify it.
         */
        foreach ($scripts as $script)
        {
            $this->content['script'][] = '<script src="' . $this->rooturl . $script . '.js?' . $flatbox->flatbox_version . '" type="text/javascript"></script>';
        }
        qa_html_theme_base::head_script();
    }

    /**
     * Adding point count for logged in user
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global array $flatbox
     */
    function logged_in()
    {
        global $flatbox;
        qa_html_theme_base::logged_in();

        $this->output($flatbox->headers['user_points']);
    }

    /**
     * Adding sidebar for mobile device
     * 
     * @access public
     * @since FlatBox 1.0.0
     */
    function body()
    {
        if (qa_is_mobile_probably()) {

            $this->output('<div id="qam-sidepanel-toggle"><i class="icon-left-open-big"></i></div>');
            $this->output('<div id="qam-sidepanel-mobile">');
            qa_html_theme_base::sidepanel();
            $this->output('</div>');
        }
        qa_html_theme_base::body();
    }

    /**
     * Adding require javascripts
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global array $flatbox
     */
    function body_script()
    {
        global $flatbox;

        qa_html_theme_base::body_script();
        $this->output($flatbox->headers['fb_like_box_init']);
        $this->output($flatbox->headers['twitter_widget_init']);
    }

    /**
     * Adding body class dynamically
     * 
     * override to add class on admin/approve-users page
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @return string body class
     */
    public function body_tags()
    {
        global $flatbox;

        $class = 'qa-template-' . qa_html($this->template);

        if (isset($this->content['categoryids'])) {
            foreach ($this->content['categoryids'] as $categoryid)
            {
                $class .= ' qa-category-' . qa_html($categoryid);
            }
        }

        // add class if admin/appovoe-users page
        if (($this->template === 'admin') && (qa_request_part(1) === 'approve')) {
            $class .= ' qam-approve-users';
        }

        $class .= ' ' . $flatbox->fixed_topbar;

        $this->output('class="' . $class . ' qa-body-js-off"');
    }

    /**
     * login form
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global array $flatbox
     */
    function nav_user_search()
    { // outputs login form if user not logged in
        global $flatbox;

        $this->output('<DIV CLASS="qam-account-items-wrapper">');

        $this->output($flatbox->headers['user_account']);

        $this->output('<DIV CLASS="qam-account-items clearfix">');

        if (!qa_is_logged_in()) {
            $login = @$this->content['navigation']['user']['login'];

            if (isset($login) && !QA_FINAL_EXTERNAL_USERS) {
                $this->output(
                        '<!--[Begin: login form]-->', 
                        '<form id="qa-loginform" action="' . $login['url'] . '" method="post">', 
                        '<input type="text" id="qa-userid" name="emailhandle" placeholder="' . trim(qa_lang_html('users/email_handle_label'), ':') . '" />', 
                        '<input type="password" id="qa-password" name="password" placeholder="' . trim(qa_lang_html('users/password_label'), ':') . '" />', 
                        '<div id="qa-rememberbox"><input type="checkbox" name="remember" id="qa-rememberme" value="1"/>', 
                        '<label for="qa-rememberme" id="qa-remember">' . qa_lang_html('users/remember') . '</label></div>', 
                        '<input type="hidden" name="code" value="' . qa_html(qa_get_form_security_code('login')) . '"/>', 
                        '<input type="submit" value="' . $login['label'] . '" id="qa-login" name="dologin" />', 
                        '</form>', 
                        '<!--[End: login form]-->'
                );

                unset($this->content['navigation']['user']['login']); // removes regular navigation link to log in page
            }
        }

        qa_html_theme_base::nav('user');
        $this->output('</DIV> <!-- END qam-account-items -->');
        $this->output('</DIV> <!-- END qam-account-items-wrapper -->');
    }

    /*
     * Adding top bar
     * 
     * @access public
     * @since FlatBox 1.0.0
     */

    function qam_body_prefix()
    {
        global $flatbox;

        $this->output('<div id="qam-topbar" class="clearfix ' . $flatbox->fixed_topbar . '">');
        $this->nav_main_sub();
        $this->output('</div><!-- END qam-topbar -->');

        $this->output($flatbox->headers['ask_button']);
        $this->qam_search('the-top', 'the-top-search');
    }

    /**
     * modifying markup for topbar
     * 
     * @access public
     * @since FlatBox 1.0.0
     */
    function nav_main_sub()
    {
        $this->output('<DIV CLASS="qam-main-nav-wrapper clearfix">');
        $this->output('<div class="sb-toggle-left qam-menu-toggle"><i class="icon-th-list"></i></div>');
        $this->logo();
        $this->nav('main');
        $this->nav_user_search();
        $this->output('</DIV> <!-- END qam-main-nav-wrapper -->');
        $this->nav('sub');
    }

    /**
     * Additional content
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global array $flatbox
     */
    function header()
    {
        global $flatbox;

        $this->output($flatbox->header_custom_content);
        $this->output('<div class="qa-main-wrapper">', '');
    }

    /**
     * The method has been overridden just to remove the '-' from the note
     * for the category page (notes). I know it is not good idea to override
     * this just for '-' it. But I did
     * intentionally to avoid such issue during the updates.
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @param type $navlink
     * @param type $class
     */
    public function nav_link($navlink, $class)
    {
        if (isset($navlink['url'])) {
            $this->output(
                    '<a href="' . $navlink['url'] . '" class="qa-' . $class . '-link' .
                    (@$navlink['selected'] ? (' qa-' . $class . '-selected') : '') .
                    (@$navlink['favorited'] ? (' qa-' . $class . '-favorited') : '') .
                    '"' . (strlen(@$navlink['popup']) ? (' title="' . $navlink['popup'] . '"') : '') .
                    (isset($navlink['target']) ? (' target="' . $navlink['target'] . '"') : '') . '>' . $navlink['label'] .
                    '</a>'
            );
        } else {
            $this->output(
                    '<span class="qa-' . $class . '-nolink' . (@$navlink['selected'] ? (' qa-' . $class . '-selected') : '') .
                    (@$navlink['favorited'] ? (' qa-' . $class . '-favorited') : '') . '"' .
                    (strlen(@$navlink['popup']) ? (' title="' . $navlink['popup'] . '"') : '') .
                    '>' . $navlink['label'] . '</span>'
            );
        }

        if (strlen(@$navlink['note'])) {

            $qam_note_class = '';
            if (strpos($navlink['note'], '> -') !== false) {
                $qam_note_class = !empty($navlink['note']) ? ' qam-cat-note' : NULL;
            }

            // search and replace within the string
            $search  = array(' - <', '> - ');
            $replace = array(' <', '> ');
            $output  = $this->output('<span class="qa-' . $class . '-note ' . $qam_note_class . '">' . str_replace($search, $replace, $navlink['note']) . '</span>');
        }
    }

    /**
     * The method is overridden just to swap the <tt>main()</tt> and <tt>sidepanel()</tt>
     * 
     * @access public
     * @since FlatBox 1.0.0
     */
    public function body_content()
    {
        $this->body_prefix();
        $this->notices();

        $this->qam_body_prefix();

        $this->output('<div class="qa-body-wrapper">', '');

        $this->widgets('full', 'top');
        $this->header();
        $this->widgets('full', 'high');

        $this->main();
        $this->sidepanel();

        $this->widgets('full', 'low');
        $this->footer();
        $this->widgets('full', 'bottom');

        $this->output('</div> <!-- END body-wrapper -->');

        $this->body_suffix();
    }

    /**
     * Overridden to customize layout and styling
     * 
     * @access public
     * @since FlatBox 1.0.0
     */
    function sidepanel()
    { // removes sidebar for user profile pages
        if (($this->template != 'user') && !qa_is_mobile_probably()) {
            $this->output('<div class="qa-sidepanel">');
            $this->qam_search();
            $this->widgets('side', 'top');
            $this->sidebar();
            $this->widgets('side', 'high');
            $this->nav('cat', 1);
            $this->widgets('side', 'low');
            $this->output_raw(@$this->content['sidepanel']);
            $this->feed();
            $this->widgets('side', 'bottom');
            $this->output('</div>', '');
        }
    }

    /**
     * To provide various color option
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global array $flatbox
     */
    public function sidebar()
    {
        global $flatbox;

        $sidebar = @$this->content['sidebar'];

        if (!empty($sidebar)) {
            $this->output('<div class="qa-sidebar ' . $flatbox->welcome_widget_color . '">');
            $this->output_raw($sidebar);
            $this->output('</div>', '');
        }
    }

    /**
     * To add close icon
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @param array $q_item
     * @global array $flatbox
     */
    public function q_item_title($q_item)
    {
        global $flatbox;
        
        $this->output(
                '<div class="qa-q-item-title">',
                // add closed note in title
                empty($q_item['closed']) ? '' : '<img src="' . $this->rooturl . $flatbox->icon_url . '/closed-q-list.png" class="qam-q-list-close-icon" alt="question-closed" title="' . qam_lang('closed_question') . '" />', '<a href="' . $q_item['url'] . '">' . $q_item['title'] . '</a>', '</div>'
        );
    }

    /**
     * To add RSS feeds icon and closed icon for closed questions
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global array $flatbox
     */
    public function title()
    {
        global $flatbox;

        $q_view = @$this->content['q_view'];

        // link title where appropriate
        $url = isset($q_view['url']) ? $q_view['url'] : false;

        // add closed image
        $closed = (!empty($q_view['closed']) ?
                        '<img src="' . $this->rooturl . $flatbox->icon_url . '/closed-q-view.png" class="qam-q-view-close-icon" alt="question-closed" width="24" height="24" title="' . qam_lang('closed_question') . '" />' : NULL );

        if (isset($this->content['title'])) {
            $this->output(
                    $closed, $url ? '<a href="' . $url . '">' : '', $this->content['title'], $url ? '</a>' : ''
            );
        }

        $feed = @$this->content['feed'];

        if (!empty($feed)) {
            $this->output('<a href="' . $feed['url'] . '" title="' . @$feed['label'] . '"><i class="icon-rss qam-title-rss"></i></a>');
        }
    }

    /**
     * To add view counter
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @param array $q_item
     */
    function q_item_stats($q_item)
    { // add view count to question list
        $this->output('<div class="qa-q-item-stats">');

        $this->voting($q_item);
        $this->a_count($q_item);
        qa_html_theme_base::view_count($q_item);

        $this->output('</div>');
    }

    /**
     * Prevent display view counter on usual place
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @param type $q_item
     */
    function view_count($q_item)
    { // Prevent display view counter on usual place
    }

    /**
     * To add view counter
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @param type $q_view
     */
    public function q_view_stats($q_view)
    {
        $this->output('<div class="qa-q-view-stats">');

        $this->voting($q_view);
        $this->a_count($q_view);
        qa_html_theme_base::view_count($q_view);

        $this->output('</div>');
    }

    /**
     * To modify user whometa, move to top
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @param type $q_view
     */
    public function q_view_main($q_view)
    {
        $this->output('<div class="qa-q-view-main">');

        if (isset($q_view['main_form_tags']))
            $this->output('<form ' . $q_view['main_form_tags'] . '>'); // form for buttons on question

        $this->post_avatar_meta($q_view, 'qa-q-view');
        $this->q_view_content($q_view);
        $this->q_view_extra($q_view);
        $this->q_view_follows($q_view);
        $this->q_view_closed($q_view);
        $this->post_tags($q_view, 'qa-q-view');

        $this->q_view_buttons($q_view);
        $this->c_list(@$q_view['c_list'], 'qa-q-view');

        if (isset($q_view['main_form_tags'])) {
            $this->form_hidden_elements(@$q_view['buttons_form_hidden']);
            $this->output('</form>');
        }

        $this->c_form(@$q_view['c_form']);

        $this->output('</div> <!-- END qa-q-view-main -->');
    }

    /**
     * To move user whometa to top in answer
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @param type $a_item
     */
    public function a_item_main($a_item)
    {
        $this->output('<div class="qa-a-item-main">');

        $this->post_avatar_meta($a_item, 'qa-a-item');

        if (isset($a_item['main_form_tags']))
            $this->output('<form ' . $a_item['main_form_tags'] . '>'); // form for buttons on answer

        if ($a_item['hidden'])
            $this->output('<div class="qa-a-item-hidden">');
        elseif ($a_item['selected'])
            $this->output('<div class="qa-a-item-selected">');

        $this->a_selection($a_item);
        $this->error(@$a_item['error']);
        $this->a_item_content($a_item);

        if ($a_item['hidden'] || $a_item['selected'])
            $this->output('</div>');

        $this->a_item_buttons($a_item);

        $this->c_list(@$a_item['c_list'], 'qa-a-item');

        if (isset($a_item['main_form_tags'])) {
            $this->form_hidden_elements(@$a_item['buttons_form_hidden']);
            $this->output('</form>');
        }

        $this->c_form(@$a_item['c_form']);

        $this->output('</div> <!-- END qa-a-item-main -->');
    }

    /**
     * To move user whometa to top in comment
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @param type $c_item
     */
    public function c_item_main($c_item)
    {
        $this->post_avatar_meta($c_item, 'qa-c-item');

        $this->error(@$c_item['error']);

        if (isset($c_item['expand_tags']))
            $this->c_item_expand($c_item);
        elseif (isset($c_item['url']))
            $this->c_item_link($c_item);
        else
            $this->c_item_content($c_item);

        $this->output('<div class="qa-c-item-footer">');
        $this->c_item_buttons($c_item);
        $this->output('</div>');
    }

    /**
     * Footer wrapper
     * 
     * @access public
     * @since FlatBox 1.0.0
     */
    function footer()
    { // prevent display of regular footer content (see body_suffix()) and replace with closing new <div>s
        $this->output('</div> <!-- END main-wrapper -->');
    }

    /**
     * Markup and icon info
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global array $flatbox
     */
    function body_suffix()
    { // to replace standard Q2A footer
        global $flatbox;

        $this->output($flatbox->footer_custom_content);
        $this->output('<div class="qam-footer-box">');

        //$this->qam_footer_items(); //additional stuffs for the footer
        $this->output($flatbox->footers['footer_columns']);

        // show / hide icons info in footer
        (qam_opt('icons_info') ? $this->output($flatbox->footers['icons_info']) : NULL);

        qa_html_theme_base::footer();
        $this->output('</div> <!-- END qam-footer-box -->', '');
    }

    /**
     * To add Q2A Market attribution
     * 
     * *************************************************************************
     * IMPORTANT!
     * -------------------------------------------------------------------------
     * FlatBox Theme by Q2A Market is released under GPL-v3.0
     * License URL: http://www.gnu.org/copyleft/gpl.html
     * 
     * According to the GPL-v3.0 license, you should not remove below credits
     * for FlatBox Theme by Q2A Market. If you do so than you are violating the 
     * license agreement.
     * 
     * You are free to add your credits with remaining Q2A Market credits note
     * in case if you modify any of the files includes with the FlatBox Theme Package
     * 
     * For more information read full license.txt file
     * 
     * *************************************************************************
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @global array $flatbox
     */
    function attribution()
    {
        global $flatbox;

        $this->output($flatbox->footers['credits']);
        qa_html_theme_base::attribution();
    }

    /**
     * To add search-box wrapper with extra class for color scheme
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @version 1.0 
     * @global array $flatbox
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    function qam_search($addon_class = FALSE, $ids = FALSE)
    {
        global $flatbox;

        $id = (($ids) ? ' id="' . $ids . '"' : NULL);

        $this->output('<div class="qam-search ' . $flatbox->ask_search_box_color . ' ' . $addon_class . '" ' . $id . ' >');
        qa_html_theme_base::search();
        $this->output('</div>');
    }

}

/*
	Omit PHP closing tag to help avoid accidental output
*/

// End of qa-theme.php