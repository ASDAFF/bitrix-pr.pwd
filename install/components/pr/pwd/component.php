<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!CModule::IncludeModule("pr.pwd")):
	ShowError(GetMessage('PR_PWD_ERR_MODULE'));
	return;
endif;

if($arParams["PWD"] == ""):
	ShowError(GetMessage('PR_PWD_ERR_PWD'));
	return;
endif;

if($arParams["FILE"] == "" OR !file_exists($_SERVER['DOCUMENT_ROOT'].SITE_DIR.$arParams["FILE"])):
	ShowError(GetMessage('PR_PWD_ERR_FILE'));
	return;
endif;

if($arParams['AJAX'] == 'Y')
{
	CJSCore::Init(array("jquery"));
	$APPLICATION->AddHeadScript( '/bitrix/components/pr/pwd/script/pr.pwd.js');
}

$PWD 				= new prPWD;
$arParams["ID"] 	= md5($arParams["PWD"].$arParams["FILE"]);
$arParams["PWD"] 	= md5($arParams["PWD"]);

$arResult = $PWD->getResult($arParams);

echo '<div class="pr_pwd">';

if($arResult['status'] === false)
	echo '<div class="error">'.$arResult['result'].'</div>';

$this->IncludeComponentTemplate();

echo '</div>';