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
$modulte_id = 'pr.pwd';

$arClasses = array(
	'prPWD' => 'classes/general/prPWD.class.php',
);

if (method_exists(CModule, "AddAutoloadClasses"))
{
	CModule::AddAutoloadClasses($modulte_id, $arClasses);
}
else
{
	foreach ($arClasses AS $ClassFile)
	{
		require_once($_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/' . $modulte_id . '/' . $ClassFile);
	}
}