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
			<h2>Password Generator</h2>
			<form action="index.php" method="post">
				<div>
					<fieldset>			
						<label class="heading">Make your selection</label><br/><br/>
						<input type="checkbox" name="checkNumber[]" value="Include a number" CHECKED><label>Include a number</label><br/>
						<input type="checkbox" name="checkSymbol[]" value="Include a symbol" CHECKED><label>Include a special symbol</label><br/>
					</fieldset>
					<fieldset>	
						<label for="min-words">How many words to use </label>
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
					
					<input type="submit" name="submit" Value="Submit Query"/>
					
					<!----- Including PHP Script ----->
					<?php require 'passwordlogic.php';?>
					
					<!----- output ----->
					<h3>The number selected (if any) is:			 <?php echo @($num); ?> </h3>
					<h3>The symbol selected (if any) is: 			 <?php echo @($sym); ?> </h3>
					<h3>The random words generated are:				 <?php echo @($words); ?> </h3>
					<h3>The upper case converion of these words:	 <?php echo @($allUpperCase); ?> </h3>
					<h3>The dashes added to these words are: 		 <?php echo @($dashes); ?> </h3>
					<h3>The camelcase conversion for these words is: <?php echo @($camelCase); ?> </h3>
					<h3>The first letter of each word upper case is: <?php echo @($lowerCase); ?> </h3>
					
					<!--<h3>Your final password is:   <?php echo @($finalPwd); ?> </h3>-->
					<h3><fieldset>	
						<label>Your final password is: </label><input type="text" name="pwd"  size="70" value = <?php echo @($finalPwd); ?> > <br/>
						</fieldset>
					</h3>
				</div>	
			</form>
	</div>
	
	
	
</body>
</html>