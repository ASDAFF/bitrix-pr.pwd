<?
#################################################
#   Company developer: PrimeWeb                 #
#   Developer: Timur R. Kalimullin              #
#   Site: http://01pr.ru                        #
#   E-mail: mail@01pr.ru                        #
#   Copyright (c) 2015 PrimeWeb                 #
#################################################
?>
<?
define("STOP_STATISTICS", true);
define("NOT_CHECK_PERMISSIONS", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$module_id 	= "pr.pwd";

if (CModule::IncludeModule($module_id))
{
	$PWD = new prPWD;
	echo $PWD->getResult();
	exit();
}