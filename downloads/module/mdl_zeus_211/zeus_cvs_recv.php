<?php

/**
 * zeus_cvs_recv.php
 *
 * @copyright Copyright (C)  ZEUS CO.,LTD.All Rights Reserved.
 * @version $Id: zeus_cvs_recv.php 16174 2011-11-29 09:27:22Z shimada $
 */

require_once '../require.php';

require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';
require_once(MODULE_REALDIR . 'mdl_zeus_211/include.php');
require_once(MODULE_REALDIR . 'mdl_zeus_211/ZeusCvsRecv.php');

$objPage = new ZeusCvsRecv();
$objPage->process();
exit;

?>