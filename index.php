<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Password Generator</title>
	<link rel="stylesheet" href="css/password.css" type="text/css"/>
			
</head>
<body>
	<div class="container">
			<!-- <div class="main">-->
			<h2>Password Generator using xkcd methodology.</h2>
			<!-- new -->
			<P>
				<ul>
					<li>What is this? </li>
						Inspired by the <em>xkcd Password Strength comic</em>, this application provides you with ten relatively complex, yet easy to remember passwords. Optionally, you can include numbers or symbols for additional complexity 
						(or to satisfy certain password requirements), and adjust the number of words.
					<li>Why should I use passwords like these?</li>
						Using common words in your password aids memorability.
						Using multiple words ensures sufficient complexity to prevent guessing of the password.
				</ul>
			<P>
			<form action="index.php" method="post">
				<div>
					<fieldset>			
						<label class="heading">Please make your selection</label><br/><br/>
						<input type="checkbox" name="checkNumber" value="Include a number" CHECKED><label>Include a Number</label><br/>
						<input type="checkbox" name="checkSymbol" value="Include a symbol" CHECKED><label>Include a Symbol</label><br/>
						
						<!--new -->
						<label for="min-chars">Please select the number of special characters to use</label>
						<select id="minChars" name="minChars">                      
							<option value="0">--Select Number--</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
						</select>
						
					</fieldset>
					<fieldset>	
						<label for="min-words">Please select the number of words to use  </label>
						<select id="minNumber" name="minNumber">                      
							<option value="0">--Select Number--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
						</select>
					</fieldset>		
					<br/>
					
					<!----- submit button --->
					<input type="submit" name="submit" Value="Submit Query"/>
					
					<!----- Including PHP Script ----->
					<?php require 'logic.php';?>
					
					<!----- output ----->
					<h4>The number generated (if any) is:			  <?php echo @($num); ?> </h4>
					<h4>The symbol generated (if any) is: 			  <?php echo @($sym); ?> </h4>
					<h4>The special characters (if any) selected are: <?php echo @($dataSpecChars); ?> </h4>
					
					<h4>The random words generated in lower case: 	  <?php echo @($words); ?> </h4>
					<h4>The upper case converion of these words:	  <?php echo @($allUpperCase); ?> </h4>
					<h4>The upper case conversion of first word is:   <?php echo @($lowerCase); ?> </h4>
					<h4>The uppercase (each word's first letter) is:  <?php echo @($upperEachWord); ?> </h4>
					<h4>The dashes added to these words are: 		  <?php echo @($dashes); ?> </h4>
					<h4>The camelcase conversion for these words is:  <?php echo @($camelCase); ?> </h4>
						
					<!--Your final password is: -->
					<h3><fieldset>	
							<label>Your final password is:    </label><input type="text" name="pwd"   size="70" value = <?php echo @($finalPwd); ?> > 
							<label>Its size in characters is: </label><input type="text" name="size"  size="5"  value = <?php echo @strlen(($finalPwd)); ?> >
						</fieldset>
					</h3>
								
								
				</div>	
			</form>
	</div>
	
	
	
</body>
</html>