<?php 

// http://en.wikipedia.org/wiki/Most_common_words_in_English


if(isset($_POST['submit']))
{
    if(!empty($_POST['checkNumber'])) 
	{
		// Counting number of checked checkboxes.
		$checkedNumber = count($_POST['checkNumber']);
		//echo '<br/>';
	}
	if(!empty($_POST['checkSymbol'])) 
	{
		// Counting number of checked checkboxes.
		$checkedSymbol = count( $_POST['checkSymbol']);
		//echo '<br/>';
	}
	if(!empty($_POST['minNumber'])) 
	{	
		$number=$_POST['minNumber'];
		//echo '<br/>';
	}
	
	$numeric = "0123456789";
	$symbol = "&*()!@$#*%";	
	$chars = "";
	$lowerCase = "";
	$allUpperCase = "";
	$one = 1;
	$camelCase = "";
	$sym = "";
	$num = "";
	$finalPwd = "";
	
	//if (isset($_POST['checkedNumber']) && $_POST['checkedNumber'] == 'on')
	if (!empty($checkedNumber)) {
		$chars = $numeric;
		$length = $one; //new
		$num = getPW ($chars, $length);
		$num  = rtrim($num);
	}	
	if (!empty($checkedSymbol)) {
		$chars = $symbol;
		//$length = $one;
		$sym = getPW ($chars, $one);
		$sym  = rtrim($sym);
	}	
	
	if(!empty($_POST['minNumber'])) 
	{	
		$number = $_POST['minNumber'];
		$words = getWords($number);
		
		$lowerCase = $words;
		//echo '<br/>';
				
		//ucfirst — Make a string's first character uppercase
		$lowerCase = ucfirst($lowerCase);  
		//echo '<br/>';
		
		
		$allUpperCase = $lowerCase;
		$allUpperCase = strtoupper($allUpperCase);
		//echo '<br/>';
		
		
		$dashes = stringDashes(rtrim($words));
		//echo '<br/>';
		
		//do camel case or hyphens.
		$camelCase = dashesToCamelCase($words);
		//echo $camelCase;
		
		//final password
		$finalPwd .= $dashes."-".$num."-".$sym	;
							
	}
		
}
		
	function getPW($mychars, $mylength) {
		$len = strlen($mychars);
		$pw = '';
		for ($i=0;$i<$mylength;$i++)
			$pw .= substr($mychars, rand(0, $len-1), 1);
		return $pw;
	}	
		
	function getWords($mylength) { //pass 4 words, pick 4 words at random
		$months = array ('time','person','year','way','day','thing','man','world','life','hand','part','child','eye','woman','place','work','week','case','point','government');
		$data = "";		
				
							
		for($j = 0; $j < $mylength; $j++) {  
			$data = $data.$months[rand(0, count($months) - 1)]." ";		
		}
					
		return $data;		
	}	
	
	function dashesToCamelCase($string, $capitalizeFirstCharacter = false) {
		$str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
		if (!$capitalizeFirstCharacter) {
			$str[0] = strtolower($str[0]);
		}
		return $str;
	}
	
	function stringDashes($text) {
		$text = strtolower(htmlentities($text)); 
		$text = str_replace(get_html_translation_table(), "-", $text);
		$text = str_replace(" ", "-", $text);
		$text = preg_replace("/[-]+/i", "-", $text);
		return $text;
	}
		
		
?>