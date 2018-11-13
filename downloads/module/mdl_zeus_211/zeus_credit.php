<?php
/**
 * zeus_credit.php
 *
 * @copyright Copyright (C)  ZEUS CO.,LTD.All Rights Reserved.
 * @version $Id: zeus_credit.php 14646 2011-06-16 01:55:00Z shimada $
 */
require_once(realpath(dirname( __FILE__)) . '/include.php');
require_once(realpath(dirname( __FILE__)) . '/ZeusSecureApi.php');

$objPage = new ZeusSecureApi();
$objPage->init();
$objPage->process();

?>
