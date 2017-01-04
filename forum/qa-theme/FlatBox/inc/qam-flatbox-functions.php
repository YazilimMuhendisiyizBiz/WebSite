<?php

/*

  FlatBox Theme for Question2Answer
  Copyright (C) 2014  Q2A Market <http://www.q2amarket.com>

  File:           inc/qam-flatbox-functions.php
  Version:        FlatBox 1.0.2
  Description:    FlatBox theme supportive functions

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

/* * *****************************************************************************
 * Note:
 * -----------------------------------------------------------------------------
 * 
 * This file doesn't hvae many functions at the moment. However this file
 * has been included with future plans and will be used for future updates.
 * So this is important that if you are modifying anything directly into this
 * file can be overridden with the new updates.
 * 
 * It is good idea to create custom file and include in appropriate file.
 * 
 * **************************************************************************** */
if (!function_exists('qam_lang')) {

    /**
     * Get or set FlatBox theme option 
     * 
     * @access public
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

//------------------------------------------------------------------------------

if (!function_exists('qam_opt')) {

    /**
     * Get or set FlatBox theme option 
     * 
     * @access public
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
    function qam_opt($name, $value = NULL)
    {
        global $flatbox;

        return qa_opt($flatbox->opt_prefix . $name, $value);
    }

}

//------------------------------------------------------------------------------

if (!function_exists('is_flatbox')) {

    /**
     * Check if theme set to <code>FlatBox</code>
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @version 1.0
     * @return boolean if <code>FlatBox</code> than true else false
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    function is_flatbox()
    {
        return (qa_opt('site_theme') === 'FlatBox') ? TRUE : FALSE;
    }

}

//------------------------------------------------------------------------------

if (!function_exists('do_print')) {

    /**
     * Output with <code>print_r()</code> to debugging
     * 
     * @access public
     * @since FlatBox 1.0.0
     * @version 1.0
     * 
     * @author Q2A Market <http://www.q2amarket.com>
     * @copyright (c) 2014, Q2A Market
     * @license http://www.gnu.org/copyleft/gpl.html
     */
    function do_print($content)
    {
        echo '<pre>';
        print_r($content);
        echo '</pre>';
    }

}

// End of qam-flatbox-functions.php