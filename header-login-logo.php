<?php
/*
Plugin Name: Header Login Logo
Description: Uses the custom header as the login logo.
Version: 1.0
License: GPL
Plugin URI: http://www.filipjohansson.se/projects/header-login-logo
Author: Filip Johansson
Author URI: http://www.filipjohansson.se

==========================================================================

Copyright 2014 Filip Johansson

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

class Header_Login_Logo {
    public function __construct() {
        add_action( 'login_head', array( $this, 'login_head' ) );
    }

    public function login_head() {
        if ( get_header_image() ):
            $height = get_custom_header()->height;
            $width = get_custom_header()->width;
            $ratio = ( $width < $height ? 274 / $width : 63 / $height );
            echo '<style type="text/css">
                h1 a {
                    background-image: url(' . get_header_image() . ') !important;
                    background-size: ' . floor( $width * $ratio ) . 'px ' . floor( $height * $ratio ) . 'px !important;
                }
            </style>';
        endif;
    }
}

new Header_Login_Logo;
