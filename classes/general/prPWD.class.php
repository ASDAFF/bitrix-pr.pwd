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
class prPWD
{
	static $module_id = "pr.pwd";
	
	public function getResult($arParams = array())
	{
		$ID 		= $_REQUEST['AJAX'] == "Y" ? $_REQUEST['ID'] : $arParams['ID'];
		$stOptions 	= COption::GetOptionString(self::$module_id, $ID);
		$arOptions 	= $stOptions != '' ? unserialize($stOptions) : array();
		$uPWD 		= md5($_REQUEST['PR_PWD']);
		
		$arResult 	= array(
			'status' => '',
			'result' => '',
		);
		
		if((count(array_diff($arParams, $arOptions)) > 0 OR count($arOptions) == 0) AND $_REQUEST['AJAX'] != "Y")
		{
			$arOptions = $arParams;
			COption::SetOptionString(self::$module_id, $ID, serialize($arOptions));
		}

		if($_REQUEST['PR_PWD'] AND $uPWD != $arOptions["PWD"])
		{
			$arResult = array(
				'status' => false,
				'result' => $arOptions['ERROR'],
			);
		}
		
		if($uPWD == $arOptions["PWD"])
		{
			require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
			ob_start();
				include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.$arOptions["FILE"]);
				$ob_get = ob_get_contents();
			ob_clean();
			ob_end_clean();
			
			$arResult = array(
				'status' => true,
				'result' => $ob_get,
			);
		}
		
		if($_REQUEST['AJAX'] == "Y")
			return CUtil::PhpToJSObject($arResult);

		return $arResult;
	}
}