<?php
include ('config.php');
include ('libs/Controller.php');
include ('libs/View.php');
include ('libs/Model.php');
include ('libs/phpQuery/phpQuery.php');
include ('helpers/HtmlHelper.php');
try
{
  $obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}






