<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$PARAMETERS = array();

$PARAMETERS ["FILE"] = array(
	"PARENT" 				=> "BASE",
	"NAME" 					=> GetMessage("PR_PWD_FILE"),
	"TYPE" 					=> "STRING",
);

$PARAMETERS ["PWD"] = array(
	"PARENT" 				=> "BASE",
	"NAME" 					=> GetMessage("PR_PWD_PWD"),
	"TYPE" 					=> "STRING",
);

$PARAMETERS ["ERROR"] = array(
	"PARENT" 				=> "BASE",
	"NAME" 					=> GetMessage("PR_PWD_ERROR"),
	"TYPE" 					=> "STRING",
);

$PARAMETERS ["AJAX"] = array(
	"PARENT" 				=> "BASE",
	"NAME" 					=> GetMessage("PR_PWD_AJAX"),
	"TYPE" 					=> "CHECKBOX",
	"DEFAULT" 				=> "Y",
);

$arComponentParameters = array(
	"PARAMETERS" => $PARAMETERS,
);