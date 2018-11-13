<?php
/**
 * zeus_edy.php
 *
 * @copyright Copyright (C)  ZEUS CO.,LTD.All Rights Reserved.
 * @version $Id: zeus_edy.php 21452 2013-06-14 05:57:04Z shimada $
 */

require_once(realpath(dirname( __FILE__)) . '/include.php');
require_once(realpath(dirname( __FILE__)) . '/ZeusEdy.php');

$objPage = new ZeusEdy();
$objPage->init();
$objPage->process();
?>
