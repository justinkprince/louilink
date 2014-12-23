<?php
/**
 * @version    $Id: strcasecmp.php 23 2014-01-11 08:24:20Z thongta $
 * @package    utf8
 * @subpackage strings
 */

//---------------------------------------------------------------
/**
 * UTF-8 aware alternative to strcasecmp
 * A case insensivite string comparison
 * Note: requires utf8_strtolower
 *
 * @param string
 * @param string
 *
 * @return int
 * @see        http://www.php.net/strcasecmp
 * @see        utf8_strtolower
 * @package    utf8
 * @subpackage strings
 */
function utf8_strcasecmp( $strX, $strY ) {
	$strX = utf8_strtolower( $strX );
	$strY = utf8_strtolower( $strY );

	return strcmp( $strX, $strY );
}

