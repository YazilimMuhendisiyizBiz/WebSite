<?php

/*

  FlatBox Theme for Question2Answer
  Copyright (C) 2014  Q2A Market <http://www.q2amarket.com>

  File:           qam-flatbox-theme-options.php
  Version:        FlatBox 1.0.2
  Description:    FlatBox theme customization options

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
 * FlatBox theme options class
 * 
 * Add all require theme customization options.
 *
 * @package FlatBox
 * @subpackage Options
 * @category Plugin
 * @since FlatBox 1.0.0
 * @version 1.0 
 * @author Q2A Market <http://www.q2amarket.com>
 * @copyright (c) 2014, Q2A Market
 * @license http://www.gnu.org/copyleft/gpl.html
 */
class qam_flatbox_theme_options
{

    /**
     *
     * @var string
     * 
     * @todo Get value from database instead of hardcoded 
     */
    private $plugin_name = 'FlatBox Theme';

    /**
     * 
     * @var string 
     * 
     * @todo Get value from database instead of hardcoded
     */
    private $prefix = 'qam_flatbox_';

    /**
     * Perform check if page is admin or not
     * 
     * @param type $template
     * @return boolean
     */
    function allow_template($template)
    {
        return ($template != 'admin');
    }

    /**
     * Set default value for register options
     * 
     * @param type $option
     * @return boolean|string|int
     */
    function option_default($option)
    {

        switch ($option) {
            case $this->prefix . 'ask_search_box_color':
                return '';

            case $this->prefix . 'welcome_widget_color':
                return '';

            case $this->prefix . 'fixed_topbar':
                return FALSE;

            case $this->prefix . 'footer_advert_code':
                return 'Add your custom <code>HTML</code> here';

            case $this->prefix . 'icons_info':
                return TRUE;

            case $this->prefix . 'facebook':
                return 'https://www.facebook.com/q2amarket';

            case $this->prefix . 'fb_height':
                return 250;

            case $this->prefix . 'twitter':
                return 'https://twitter.com/Q2AMarket';

            case $this->prefix . 'twitter_widget_id':
                return '362121220734464000';

            case $this->prefix . 'twitter_id':
                return 'Q2AMarket';
                
            case $this->prefix . 'twitter_height':
                return 250;

            case $this->prefix . 'gplus':
                return 'https://plus.google.com/+Q2amarket/about';

            case $this->prefix . 'linkedin':
                return 'https://www.linkedin.com/in/q2amarket';

            case $this->prefix . 'youtube':
                return 'https://www.youtube.com/user/q2amarket';

            case $this->prefix . 'vimeo':
                return 'https://vimeo.com/q2amarket';

            case $this->prefix . 'pinterest':
                return 'http://www.pinterest.com/q2amarket/';

            case $this->prefix . 'github':
                return 'https://github.com/q2amarket';

            case $this->prefix . 'wordpress':
                return 'http://www.pixelngrain.com';


            default:
                return null;
        }
    }

    /* ------------------------------------------------------
      add form element to plugin options
      this will allows usre to customize plugin
      by defined fields
      ------------------------------------------------------ */

    /**
     * theme options / admin form
     * 
     * @param array $qa_content
     * @return mixed fields value
     */
    function admin_form(&$qa_content)
    {
        $saved = false;

        /* -- select options array -- */
        $colors = array(
            ''            => 'white',
            'orange'      => 'orange',
            'carrot'      => 'carrot',
            'alizarin'    => 'alizarin',
            'turquoise'   => 'turquoise',
            'emerald'     => 'emerald',
            'peter-river' => 'peter-river',
            'amethyst'    => 'amethyst',
            'wet-asphalt' => 'wet-asphalt',
        );

        // saving options
        if (qa_clicked('snow_settings_save')) {
            $this->qam_opt('ask_search_box_color', $this->qam_post_text('ask_search_box_color'));
            $this->qam_opt('welcome_widget_color', $this->qam_post_text('welcome_widget_color'));
            $this->qam_opt('fixed_topbar', (bool) $this->qam_post_text('fixed_topbar'));
            $this->qam_opt('icons_info', (bool) $this->qam_post_text('icons_info'));

            $this->qam_opt('header_custom_content', $this->qam_post_text('header_custom_content'));
            $this->qam_opt('above_footer_custom_content', $this->qam_post_text('above_footer_custom_content'));

            $this->qam_opt('footer_advert_code', $this->qam_post_text('footer_advert_code'));
            $this->qam_opt('facebook', $this->qam_post_text('facebook'));
            $this->qam_opt('fb_height', (int) $this->qam_post_text('fb_height'));
            $this->qam_opt('twitter', $this->qam_post_text('twitter'));
            $this->qam_opt('twitter_widget_id', $this->qam_post_text('twitter_widget_id'));
            $this->qam_opt('twitter_by', $this->qam_post_text('twitter_by'));
            $this->qam_opt('twitter_height', (int) $this->qam_post_text('twitter_height'));
            $this->qam_opt('gplus', $this->qam_post_text('gplus'));
            $this->qam_opt('linkedin', $this->qam_post_text('linkedin'));
            $this->qam_opt('youtube', $this->qam_post_text('youtube'));
            $this->qam_opt('vimeo', $this->qam_post_text('vimeo'));
            $this->qam_opt('pinterest', $this->qam_post_text('pinterest'));
            $this->qam_opt('github', $this->qam_post_text('github'));
            $this->qam_opt('wordpress', $this->qam_post_text('wordpress'));
            $saved = true;
        } else if (qa_clicked('snow_settings_reset')) {
            foreach ($_POST as $i => $v) {
                $def = $this->option_default($i);
                if ($def !== null) qa_opt($i, $def);
            }
            $saved = true;
        }

        return array(
            'ok'      => $saved ? $this->plugin_name . qam_lang('settings_saved') : null,
            'fields'  => array(
                array(
                    'label' => qam_lang('hidden'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('hidden'),
                    'tags'  => 'NAME="' . $this->prefix . 'hidden" ID="' . $this->prefix . 'hidden" style="display:none"',
                ),
                array(
                    'label'   => qam_lang('ask_search_box_color'),
                    'tags'    => 'NAME="' . $this->prefix . 'ask_search_box_color"',
                    'id'      => $this->prefix . 'ask_search_box_color',
                    'type'    => 'select',
                    'options' => $colors,
                    'value'   => $this->qam_opt('ask_search_box_color'),
                ),
                array(
                    'label'   => qam_lang('welcome_widget_color'),
                    'tags'    => 'NAME="' . $this->prefix . 'welcome_widget_color"',
                    'id'      => $this->prefix . 'welcome_widget_color',
                    'type'    => 'select',
                    'options' => $colors,
                    'value'   => $this->qam_opt('welcome_widget_color'),
                ),
                array(
                    'label' => qam_lang('fixed_topbar'),
                    'type'  => 'checkbox',
                    'value' => (bool) $this->qam_opt('fixed_topbar'),
                    'tags'  => 'NAME="' . $this->prefix . 'fixed_topbar" ID="' . $this->prefix . 'fixed_topbar"',
                ),
                array(
                    'label' => qam_lang('show_icons_info'),
                    'type'  => 'checkbox',
                    'value' => (bool) $this->qam_opt('icons_info'),
                    'tags'  => 'NAME="' . $this->prefix . 'icons_info" ID="' . $this->prefix . 'icons_info"',
                ),
                /* --- blank --- */
                array(
                    'type' => 'blank'
                ),
                /* --- blank --- */
                array(
                    'label' => qam_lang('header_custom_content'),
                    'type'  => 'textarea',
                    'value' => $this->qam_opt('header_custom_content'),
                    'tags'  => 'NAME="' . $this->prefix . 'header_custom_content" ID="' . $this->prefix . 'header_custom_content"',
                    'rows'  => 3,
                ),
                array(
                    'label' => qam_lang('above_footer_custom_content'),
                    'type'  => 'textarea',
                    'value' => $this->qam_opt('above_footer_custom_content'),
                    'tags'  => 'NAME="' . $this->prefix . 'above_footer_custom_content" ID="' . $this->prefix . 'above_footer_custom_content"',
                    'rows'  => 3,
                ),
                /* --- blank --- */
                array(
                    'type' => 'blank'
                ),
                /* --- blank --- */
                /** footer * */
                array(
                    'label' => qam_lang('footer_advert_code'),
                    'type'  => 'textarea',
                    'value' => $this->qam_opt('footer_advert_code'),
                    'tags'  => 'NAME="' . $this->prefix . 'footer_advert_code" ID="' . $this->prefix . 'footer_advert_code"',
                    'rows'  => 3,
                ),
                array(
                    'label' => qam_lang('facebook'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('facebook'),
                    'tags'  => 'NAME="' . $this->prefix . 'facebook"',
                ),
                array(
                    'label' => qam_lang('fb_height'),
                    'type'  => 'number',
                    'value' => (int) $this->qam_opt('fb_height'),
                    'tags'  => 'NAME="' . $this->prefix . 'fb_height"',
                ),
                array(
                    'label' => qam_lang('twitter'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('twitter'),
                    'tags'  => 'NAME="' . $this->prefix . 'twitter"',
                ),
                array(
                    'label' => qam_lang('twitter_widget_id'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('twitter_widget_id'),
                    'tags'  => 'NAME="' . $this->prefix . 'twitter_widget_id"',
                ),
                array(
                    'label' => qam_lang('twitter_id'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('twitter_id'),
                    'tags'  => 'NAME="' . $this->prefix . 'twitter_id"',
                ),
                array(
                    'label' => qam_lang('twitter_height'),
                    'type'  => 'number',
                    'value' => (int) $this->qam_opt('twitter_height'),
                    'tags'  => 'NAME="' . $this->prefix . 'twitter_height"',
                ),
                array(
                    'label' => qam_lang('gplus'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('gplus'),
                    'tags'  => 'NAME="' . $this->prefix . 'gplus"',
                ),
                array(
                    'label' => qam_lang('linkedin'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('linkedin'),
                    'tags'  => 'NAME="' . $this->prefix . 'linkedin"',
                ),
                array(
                    'label' => qam_lang('youtube'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('youtube'),
                    'tags'  => 'NAME="' . $this->prefix . 'youtube"',
                ),
                array(
                    'label' => qam_lang('vimeo'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('vimeo'),
                    'tags'  => 'NAME="' . $this->prefix . 'vimeo"',
                ),
                array(
                    'label' => qam_lang('pinterest'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('pinterest'),
                    'tags'  => 'NAME="' . $this->prefix . 'pinterest"',
                ),
                array(
                    'label' => qam_lang('github'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('github'),
                    'tags'  => 'NAME="' . $this->prefix . 'github"',
                ),
                array(
                    'label' => qam_lang('wordpress'),
                    'type'  => 'text',
                    'value' => $this->qam_opt('wordpress'),
                    'tags'  => 'NAME="' . $this->prefix . 'wordpress"',
                ),
            ),
            'buttons' => array(
                array(
                    'label' => qam_lang('save_settings'),
                    'tags'  => 'NAME="snow_settings_save"',
                ),
                array(
                    'label' => qam_lang('reset_settings'),
                    'tags'  => 'NAME="snow_settings_reset"',
                ),
            ),
        );
    }

    /**
     * Get or set FlatBox theme option
     * 
     * The function set FlatBox prefix by default and no need to add prefix in
     * parameter.
     * 
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @param string $name option key
     * @param mixed $value option value
     * @return mixed option key output
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function qam_opt($name, $value = NULL)
    {
        return qa_opt($this->prefix . $name, $value);
    }

    /**
     * post field with snow theme prefix
     * 
     * The function set FlatBox prefix by default and no need to add prefix in
     * parameter.
     * 
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @param string $field field name
     * @return mixed value of the field
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    private function qam_post_text($field)
    {
        return qa_post_text($this->prefix . $field);
    }

}

if (!function_exists('qam_lang')) {

    /**
     * Language item for snow theme
     * 
     * This is the same function as in <code>qam-snow-functions.php</code><br/>
     * Since Q2A doesn't call this function in theme, created again here.
     * 
     * @access private
     * @since FlatBox 1.0.0
     * @version 1.0
     * @param string $lang language key
     * @return string language item
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    function qam_lang($lang)
    {
        return qa_lang_html('qam_flatbox_theme_lang/' . $lang);
    }

}

// End of qam-flatbox-theme-options.php