<?php 

// http://en.wikipedia.org/wiki/Most_common_words_in_English


if(isset($_POST['submit']))
{
    if(!empty($_POST['checkNumber'])) {
		// remove count
		$checkedNumber = $_POST['checkNumber'];
	}
	if(!empty($_POST['checkSymbol'])) {
		// remove count
		$checkedSymbol =  $_POST['checkSymbol'];
	}
	if(!empty($_POST['minNumber'])) {	
		$number = $_POST['minNumber'];
	}
	
	//local variables
	$numeric = "0123456789";
	$symbol = "&*()!@$#*%";	
	$one = 1;
	
	//$chars = "";
	$lowerCase = "";
	$allUpperCase = "";
	$camelCase = "";
	$sym = "";
	$num = "";
	$finalPwd = "";
	
	//if (isset($_POST['checkedNumber']) && $_POST['checkedNumber'] == 'on')
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
	
	if(!empty($_POST['minNumber'])) {	
	
		$number = $_POST['minNumber'];
		
		//calling a function to get 'X' number of words at random from an array of English words
		//the number is selected from the user from a drop down list
		$words = getWords($number);
		
		//ucfirst — Make a string's first character uppercase
		$lowerCase = ucfirst($words);  
				
		//php predefined funcion to convert strings to upper case		
		$allUpperCase = strtoupper($lowerCase);
		
		//calling a function to add dashes to words		
		$dashes = stringToDashes(rtrim($words));
				
		//calling this function to convert dashes to camel case
		$camelCase = dashesToCamelCase($words);
				
		//final password, concatening number + symbols to words
		$finalPwd .= $dashes."-".$num."-".$sym	;
							
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
	
	//This function contains an array of 30 English words and returns 'X' number of words depending of the myLength value
	function getWords($mylength) { 
	
		$months = array ('time','person','year','way','day','thing','man','world','life','hand','part','child','eye','woman','place','work','week','case','point','government','company',
						 'number','group','problem','fact','be','have','do','say','get');
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
	function stringToDashes($text) {
		$text = strtolower(htmlentities($text)); 
		$text = str_replace(get_html_translation_table(), "-", $text);
		$text = str_replace(" ", "-", $text);
		$text = preg_replace("/[-]+/i", "-", $text);
		return $text;
	}
		
		
?>