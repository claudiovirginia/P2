<?php 

	
if(isset($_POST['submit']))
{
    if(!empty($_POST['checkNumber'])) {
		$checkedNumber = $_POST['checkNumber'];
	}
	if(!empty($_POST['checkSymbol'])) {
		$checkedSymbol =  $_POST['checkSymbol'];
	}
	if(!empty($_POST['minNumber'])) {	
		$number = $_POST['minNumber'];
	}
	if(!empty($_POST['minChars'])) {	
		$specialChars = $_POST['minChars'];
	}
	
	//local variables
	$numeric = "0123456789";
	$symbol = "^+&*()!@$#*%";	
	$one = 1;
	$lowerCase = "";
	$allUpperCase = "";
	$camelCase = "";
	$sym = "";
	$num = "";
	$finalPwd = "";
	$upperEachWord = "";
	
	if (!empty($checkedNumber)) {
		$chars = $numeric;
		$num = getPW ($chars, $one);
		$num  = rtrim($num);
	}	
	if (!empty($checkedSymbol)) {
		$chars = $symbol;
		$sym = getPW ($chars, $one);
		$sym  = rtrim($sym);
	}	
	
	if (!empty($specialChars)) {
		$dataSpecChars = getPW ($symbol, $specialChars);
	}
		
	
	if(!empty($_POST['minNumber'])) {	
	
		$number = $_POST['minNumber'];
		
		//calling a function to get 'n' number of words at random from an array of English words
		//the number is selected from the user from a drop down list
		$words = getWords($number);
		
		//ucfirst — Make a string's first character uppercase
		$lowerCase = ucfirst($words);  
		
		//make the first letter of each word uppercase 
		$arr = explode(" ", $words);
		$result = array();
		for($i = 0; $i < count($arr); $i++) {
			$upperEachWord .= ucfirst($arr[$i])." ";
		}
				
		
		//php predefined funcion to convert strings to upper case		
		$allUpperCase = strtoupper($lowerCase);
		
		//calling a function to add dashes to words		
		$dashes = stringToDashes(rtrim($words));
				
		//calling this function to convert dashes to camel case
		$camelCase = dashesToCamelCase($words);
				
		//final password, concatening number + symbols to words
		$finalPwd .= $dashes.$num.$sym.$dataSpecChars;
							
	}
		
}
	// This function receives and array of numbers/symbols and a number and returns a number/symbol at random from that array	
	function getPW($mychars, $mylength) {
		$len = strlen($mychars);
		$pw = '';
		for ($i = 0; $i < $mylength; $i++)
			$pw .= substr($mychars, rand(0, $len - 1), 1);
		return $pw;
	}
	
	//This function contains an array of 40 English words and returns 'X' number of words depending of the myLength value. I got this list from the following site: http://en.wikipedia.org/wiki/Most_common_words_in_English
	function getWords($mylength) { 
	
		$months = array ('time','person','year','way','day','thing','man','world','life','hand','part','child','eye','woman','place','work','week','case','point','government','company',
						 'number','group','problem','fact','be','have','do','say','get','make','go','know','good','first','last','long','great','little','own','other');
		$data = "";		
		for($j = 0; $j < $mylength; $j++) {  
			$data = $data.$months[rand (0, count($months) - 1)]." ";		
		}
		return $data;		
	}	
	
	//This function converts a string of words containing dashes to camel case
	function dashesToCamelCase($words, $FirstCharacter = false) {
		$str = str_replace(' ', '', ucwords(str_replace('-', ' ', $words)));
		if (!$FirstCharacter) {
			$str[0] = strtolower($str[0]);
		}
		return $str;
	}
	
	//This function add dashes to a string of words
	function stringToDashes($str) {
		$str = str_replace(get_html_translation_table(), "-", strtolower(htmlentities($str)));
		$str = str_replace(" ", "-", $str);
		$str = preg_replace("/[-]+/i", "-", $str);
		return $str;
	}
		
		
?>