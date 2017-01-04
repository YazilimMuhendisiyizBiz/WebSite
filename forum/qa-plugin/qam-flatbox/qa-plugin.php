<?php

/*

  FlatBox Theme for Question2Answer
  Copyright (C) 2014  Q2A Market <http://www.q2amarket.com>

  File:           qa-plugin.php
  Version:        FlatBox 1.0.2
  Description:    FlatBox theme plugin registration

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

/*
  Plugin Name: FlatBox Theme
  Plugin URI: http://store.q2amarket.com/q2a-free-themes/flatbox
  Plugin Description: FlatBox Theme by Q2A Market Settings
  Plugin Version: 1.0.2
  Plugin Date: 2014-12-17
  Plugin Author: Q2A Market
  Plugin Author URI: http://www.q2amarket.com/
  Plugin License: GPLv3
  Plugin Minimum Question2Answer Version: 1.6
  Plugin Update Check URI: http://q2amarket.com/meta/update/plugins/flatbox/qa-plugin.php
 */


if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}

qa_register_plugin_phrases('qam-flatbox-theme-lang.php', 'qam_flatbox_theme_lang');
qa_register_plugin_module('module', 'qam-flatbox-theme-options.php', 'qam_flatbox_theme_options', 'Q2A Market FlatBox Theme Settings');


/*
	Omit PHP closing tag to help avoid accidental output
*/

// End of qa-plugin.php