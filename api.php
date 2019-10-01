<?php
define('ROOT_DIR', dirname(__FILE__) . '/');
require_once('class-converter.php');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
$data = json_decode(file_get_contents("php://input"));
if ($data != null) {
	if ($data->text && $data->text != null) {
		$options = array(
			'input_font' => 'zawgyi-one', // win innwa, ayar, zawgyi-one, myanmar3
			'output' => 'myanmar3', // ayar, zawgyi-one, myanmar3
			'encoding' => '', //this is input source font encoding ascii or utf-8
			'spelling_check' => true, //boolean
			'text_only' => false, //boolean
			'en_zwsp' => false, //boolean
			'exceptions' => '', //words list seperated by comma to ignore from converter
			'suggested' => true, //boolean
		);
		$converter = new Converter();
		$data->text = $converter->convert($data->text, $options);
		
	} else {
		$data->text = "EMPTY_TEXT";
	}
} else {
	$data["text"] = "EMPTY_TEXT";
}
echo json_encode($data);
?>