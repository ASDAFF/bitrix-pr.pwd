<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?
if($arResult['status'] === true)
{
	echo $arResult['result'];
}
else
{
	echo '
	<form method="POST">
		<input type="password" name="PR_PWD" placeholder="'.GetMessage('PR_PWD_PLACEHOLDER').'">
		<input type="hidden" name="ID" value="'.$arParams["ID"].'">
		<input type="hidden" name="AJAX" value="'.$arParams["AJAX"].'">
		<input type="submit">
	</form>
	';
}
?>