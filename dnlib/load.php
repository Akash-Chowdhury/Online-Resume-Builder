<?php

session_start();
require('config.php');
require('class/action.class.php');
require('class/database.class.php');
require('class/custom.class.php');
require('class/helper.class.php');
require('class/session.class.php');
require('class/view.class.php');

$action=new Action;
?>