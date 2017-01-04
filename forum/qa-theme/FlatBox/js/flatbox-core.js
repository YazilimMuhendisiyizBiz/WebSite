/*

    FlatBox Theme for Question2Answer
    Copyright (C) 2014  Q2A Market <http://www.q2amarket.com>

    File:           flatbox-core.js
    Version:        FlatBox 1.0.0
    Description:    FlatBox theme core stylesheet

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
$(document).ready(function () {

    /**
     * Account menu box toggle script
     */
    $('#qam-account-toggle').click(function (e) {
        e.stopPropagation();
        $(this).toggleClass('account-active');
        $('.qam-account-items').slideToggle(100);
    });

    $(document).click(function () {
        $('#qam-account-toggle.account-active').removeClass('account-active');
        $('.qam-account-items:visible').slideUp(100);
    });

    $('.qam-account-items').click(function (event) {
        event.stopPropagation();
    });

    /**
     * Main navigation toggle script
     */
    $('.qam-menu-toggle').click(function () {
        $('.qa-nav-main').slideToggle(100);
        $(this).toggleClass('current');
    });

    /*
     * Sidepannel Toggle Click Function
     */
    $('#qam-sidepanel-toggle').click(function () {
        $('#qam-sidepanel-mobile').toggleClass('open');
        $(this).toggleClass('active');
        $(this).find('i').toggleClass('icon-right-open-big');
    });

    /**
     * Toggle search box for small screen
     */
    $('#qam-search-mobile').click(function () {
        $(this).toggleClass('active');
        $('#the-top-search').slideToggle('fast');
    });


    /*
     * Add wrapper to users point on users list
     */
    $('.qa-top-users-score').wrapInner('<div class="qam-usre-score-icon"></div>');

    /* 
     * add option lable in plugin option section
     */
    $('.qa-part-form-plugin-options').prepend('<h2>Plugin Option</h2>');

    /*
     * add wrapper to the message sent note 'td'
     */
    $('.qa-part-form-message .qa-form-tall-ok').wrapInner('<div class="qam-pm-message"></div>');

    // fix the visible issue for main nav, top search-box
    $(window).resize(function () {
        if (window.matchMedia('(min-width: 980px)').matches) {
            $(".qam-search.the-top .qa-search").hide();
            $(".qa-nav-main").show();
        } else {
            $(".qam-search.the-top .qa-search").show();
        }
    });

    // space
    var THEME_SLUG  =   'flatbox';
    var CDN         =   'http://q2amarket.com/cdn/themes-feeds/';
    var FORM        =   '.html';

    $('#qam_flatbox_hidden').before('<iframe id="q2am_highlights_iframe" src="'+ CDN + THEME_SLUG + FORM + '" width="100%" frameborder="0" scrolling="no" onload="AdjustIFrame(\'RefFrame\');"></iframe>');

});