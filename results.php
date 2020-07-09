<!DOCTYPE html>
<html lang="en">

<title>School Uniform Database - Results</title>

<link rel="stylesheet" href="stylesheet.css" type="text/css" media="all">
<link rel="icon" href="images/favicon.ico">

<meta charset="UTF-8">
<meta name="description" content="School Unifrom Database - Results">
<meta name="author" content="Jake Whitelock - S6034385">

<!-- Set the viewport -->
<meta name="viewport" content="width=device-width, initial scale=1.0">

	<!-- Pull data from database using form values -->
		<?php
		
		//set path to database
		$db ="sqlite:/var/database/uniformdatabase.db";
		
		//create connection to database
		$dbc = new PDO($db) or die ("\n<!--db='" . $db . "'-->\n");
			
		//start sql query construction
		$sql = "SELECT * ";
		$sql = $sql . " FROM SUDS, school_emblem, school_uniform, school_badge"; 
		$sql = $sql . " WHERE SUDS.school_ID = school_emblem.School_ID";
		$sql = $sql . " AND SUDS.school_ID = school_uniform.School_ID";
		$sql = $sql . " AND SUDS.school_ID = school_badge.School_ID";
		
		//school badge
		if ( isset ( $_GET['emblem_shape'] ) ){
			//field to get value
			$emblem_shape = $_GET['emblem_shape'];
			
			//use value to append sql query
			$sql = $sql . " AND School_emblem.Emblem_shape LIKE '%" . $emblem_shape . "%'";
		}

		if( isset( $_GET['defining_feature'] ) ){
			//field to get value
			$defining_feature = $_GET['defining_feature'];

			//use value to append sql query
			$sql = $sql . " AND School_emblem.Defining_feature LIKE '%" . $defining_feature . "%'";
		}

		if( isset( $_GET['lettering_text'] )  && trim($_GET['lettering_text'] ) != ""){
			//field to get value
			$lettering_text = trim($_GET['lettering_text']);

			//use value to append sql query
			$sql = $sql . " AND School_emblem.Lettering LIKE '%" . $lettering_text . "%'";
		}

		if( isset( $_GET['emblem_text'] )  && trim($_GET['emblem_text'] ) != ""){
			//field to get value
			$emblem_text = trim($_GET['emblem_text']);

			//use value to append sql query
			$sql = $sql . " AND School_emblem.Emblem_Text LIKE '%" . $emblem_text . "%'";
		}
		
		//checkboxes
		if( isset( $_GET['checkbox_blazer'] ) && $_GET['checkbox_blazer'] == 'yes'){
			$sql = $sql . " AND School_uniform.Blazer = 1";
		}

		if( isset( $_GET['checkbox_jumper'] ) && $_GET['checkbox_jumper'] == 'yes'){
			$sql = $sql . " AND School_uniform.Jumper = 1";
		}

		if( isset( $_GET['checkbox_cardigan'] ) && $_GET['checkbox_cardigan'] == 'yes'){
			$sql = $sql . " AND School_uniform.cardigan = 1";
		}

		if( isset( $_GET['checkbox_shirt'] ) && $_GET['checkbox_shirt'] == 'yes'){
			$sql = $sql . " AND School_uniform.shirt = 1";
		}

		if( isset( $_GET['checkbox_polo_shirt'] ) && $_GET['checkbox_polo_shirt'] == 'yes'){
			$sql = $sql . " AND School_uniform.polo_shirt = 1";
		}

		if( isset( $_GET['checkbox_trousers'] ) && $_GET['checkbox_trousers'] == 'yes'){
			$sql = $sql . " AND School_uniform.trousers = 1";
		}

		if( isset( $_GET['checkbox_skirt'] ) && $_GET['checkbox_skirt'] == 'yes'){
			$sql = $sql . " AND School_uniform.skirt = 1";
		}

		if( isset( $_GET['checkbox_check_dress'] ) && $_GET['checkbox_check_dress'] == 'yes'){
			$sql = $sql . " AND School_uniform.check_dress = 1";
		}

		if( isset( $_GET['checkbox_tie'] ) && $_GET['checkbox_tie'] == 'yes'){
			$sql = $sql . " AND School_uniform.Tie = 1";
		}
		
		//uniform colours
		if( isset( $_GET['blazer_colour'] )  && trim($_GET['blazer_colour'] ) != ""){
			//field to get value
			$blazer_colour = trim($_GET['blazer_colour']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.blazer_colour LIKE '%" . $blazer_colour . "%'";
		}

		if( isset( $_GET['jumper_colour'] )  && trim($_GET['jumper_colour'] ) != ""){
			//field to get value
			$jumper_colour = trim($_GET['jumper_colour']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.jumper_colour LIKE '%" . $jumper_colour . "%'";
		}

		if( isset( $_GET['cardigan_colour'] )  && trim($_GET['cardigan_colour'] ) != ""){
			//field to get value
			$cardigan_colour = trim($_GET['cardigan_colour']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.cardigan_colour LIKE '%" . $cardigan_colour . "%'";
		}

		if( isset( $_GET['shirt_colour'] )  && trim($_GET['shirt_colour'] ) != ""){
			//field to get value
			$shirt_colour = trim($_GET['shirt_colour']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.shirt_colour LIKE '%" . $shirt_colour . "%'";
		}

		if( isset( $_GET['polo_shirt_colour'] )  && trim($_GET['polo_shirt_colour'] ) != ""){
			//field to get value
			$polo_shirt_colour = trim($_GET['polo_shirt_colour']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.polo_shirt_colour LIKE '%" . $polo_shirt_colour . "%'";
		}

		if( isset( $_GET['trousers_colour'] )  && trim($_GET['trousers_colour'] ) != ""){
			//field to get value
			$trousers_colour = trim($_GET['trousers_colour']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.trousers_colour LIKE '%" . $trousers_colour . "%'";
		}

		if( isset( $_GET['skirt_colour'] )  && trim($_GET['skirt_colour'] ) != ""){
			//field to get value
			$skirt_colour = trim($_GET['skirt_colour']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.skirt_colour LIKE '%" . $skirt_colour . "%'";
		}

		if( isset( $_GET['check_dress_colour'] )  && trim($_GET['check_dress_colour'] ) != ""){
			//field to get value
			$check_dress_colour  = trim($_GET['check_dress_colour']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.check_dress_colour LIKE '%" . $check_dress_colour . "%'";
		}

		if( isset( $_GET['tie_colour'] )  && trim($_GET['tie_colour'] ) != ""){
			//field to get value
			$tie_colour = trim($_GET['tie_colour']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.tie_colour LIKE '%" . $tie_colour. "%'";
		}

		if( isset( $_GET['tie_trim'] )  && trim($_GET['tie_trim'] ) != ""){
			//field to get value
			$tie_trim = trim($_GET['tie_trim']);

			//use value to append sql query
			$sql = $sql . " AND School_uniform.tie_trim LIKE '%" . $tie_trim . "%'";
		}
				$sql = $sql . " ORDER BY SUDS.School";

		
		//set query as part of the database connection object
		$query=$dbc->query($sql);

		?>
	
	<!-- (How To Create a Collapsed Sidebar, 2020) -->
	<!-- Sidebar  -->
	<div id="searchSidebar" class="sidebar">
	
	<!-- if screen is 370px or less, alt close button -->
	<a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">&times;</a>

			<h5>School badge description if able:</h5>
		
		<form name="form" action="results.php" onsubmit="return validateForm()" method="get">
		
		<!-- Setting drop down values to form input -->
		<!-- (How to set the selected option of <select> tag from the PHP – Vasiljevski Nikola, 2020) -->
		
		
			<span class="line">
				<label for="emblem_shape">Emblem Shape:</label>
					<select name="emblem_shape">
						<option <?php if ($emblem_shape == "") echo 'selected'; ?> value="">N/A</option>
						<option <?php if ($emblem_shape == "Block") echo 'selected'; ?> value="Block">Block</option>
						<option <?php if ($emblem_shape == "Round") echo 'selected'; ?> value="Round">Round</option>
						<option <?php if ($emblem_shape == "Square") echo 'selected'; ?> value="Square">Square</option>
					</select>
			</span>
			
			<span class="line">
				<label for="defining_feature">Defining Feature:</label>
					<select name="defining_feature">
						<option <?php if ($defining_feature == "") echo 'selected'; ?> value="">N/A</option>
						<option <?php if ($defining_feature == "Birds") echo 'selected'; ?> value="Birds">Birds</option>
						<option <?php if ($defining_feature == "Branch") echo 'selected'; ?> value="Branch">Branch</option>
						<option <?php if ($defining_feature == "Bridge") echo 'selected'; ?> value="Bridge">Bridge</option>
						<option <?php if ($defining_feature == "Butterfly") echo 'selected'; ?> value="Butterfly">Butterfly</option>
						<option <?php if ($defining_feature == "Castle") echo 'selected'; ?> value="Castle">Castle</option>
						<option <?php if ($defining_feature == "Children") echo 'selected'; ?> value="Children">Children</option>
						<option <?php if ($defining_feature == "Church") echo 'selected'; ?> value="Church">Church</option>
						<option <?php if ($defining_feature == "Circle") echo 'selected'; ?> value="Circle">Circle</option>
						<option <?php if ($defining_feature == "Cross") echo 'selected'; ?> value="Cross">Cross</option>
						<option <?php if ($defining_feature == "Earth") echo 'selected'; ?> value="Earth">Earth</option>
						<option <?php if ($defining_feature == "Hands") echo 'selected'; ?> value="Hands">Hands</option>
						<option <?php if ($defining_feature == "House") echo 'selected'; ?> value="House">House</option>
						<option <?php if ($defining_feature == "Just_text") echo 'selected'; ?> value="Just_text">Just text</option>
						<option <?php if ($defining_feature == "Kite_Shield") echo 'selected'; ?> value="Kite_Shield">Kite Shield</option>
						<option <?php if ($defining_feature == "Letter_M") echo 'selected'; ?> value="Letter_M">Letter M</option>
						<option <?php if ($defining_feature == "Letter_N") echo 'selected'; ?> value="Letter_N">Letter N</option>
						<option <?php if ($defining_feature == "Lion") echo 'selected'; ?> value="Lion">Lion</option>
						<option <?php if ($defining_feature == "Owl") echo 'selected'; ?> value="Owl">Owl</option>
						<option <?php if ($defining_feature == "Scepter") echo 'selected'; ?> value="Scepter">Scepter</option>
						<option <?php if ($defining_feature == "School") echo 'selected'; ?> value="School">School</option>
						<option <?php if ($defining_feature == "Sextant") echo 'selected'; ?> value="Sextant">Sextant</option>
						<option <?php if ($defining_feature == "Shield_and_cross") echo 'selected'; ?> value="Shield_and_cross">Shield and cross</option>
						<option <?php if ($defining_feature == "Ship") echo 'selected'; ?> value="Ship">Ship</option>
						<option <?php if ($defining_feature == "Ship wheel") echo 'selected'; ?> value="Ship wheel">Ship wheel</option>
						<option <?php if ($defining_feature == "Spiral") echo 'selected'; ?> value="Spiral">Spiral</option>
						<option <?php if ($defining_feature == "Stick_figures") echo 'selected'; ?> value="Stick_figures">Stick figures</option>
						<option <?php if ($defining_feature == "Sun") echo 'selected'; ?> value="Sun">Sun</option>
						<option <?php if ($defining_feature == "Tilde") echo 'selected'; ?> value="Tilde">Tilde</option>
						<option <?php if ($defining_feature == "Tree") echo 'selected'; ?> value="Tree">Tree</option>		
						<option <?php if ($defining_feature == "Unicorn") echo 'selected'; ?> value="Unicorn">Unicorn</option>		
					</select>
			</span>
				
			<!-- Set textboxes value to form value-->
			<!-- (PHP?, 2020) -->
			<span class="line">
				<label for="lettering_text">Lettering:</label>
				<input type="text" name="lettering_text" placeholder="Lettering Text" value="<?php echo htmlentities($lettering_text); ?>" >
			</span>
			
			<span class="line">
				<label for="emblem_text">Emblem Text:</label>
				<input type="text" name="emblem_text" placeholder="Emblem Text" value="<?php echo htmlentities($emblem_text); ?>" >
			</span>
		
			<h5>School uniform description if able:</h5>
						
				<!-- Uniform Components -->
				<span class="line">
					<label class="container" >Blazer
						<input type="checkbox" name="checkbox_blazer" value="yes" <?php if ($_GET['checkbox_blazer'] == 'yes') echo 'checked'; ?> >
						<span class="checkmark"></span>
					</label>
				</span>
	
				<span class="line">
					<label class="container" >Jumper
						<input type="checkbox" name="checkbox_jumper" value="yes" <?php if ($_GET['checkbox_jumper'] == 'yes') echo 'checked'; ?> >
						<span class="checkmark"></span>
					</label>
				</span>
					
				<span class="line">
					<label class="container" >Cardigan
						<input type="checkbox" name="checkbox_cardigan" value="yes" <?php if ($_GET['checkbox_cardigan'] == 'yes') echo 'checked'; ?> >
						<span class="checkmark"></span>
					</label>
				</span>
	
				<span class="line">
					<label class="container" >Shirt
						<input type="checkbox" name="checkbox_shirt" value="yes" <?php if ($_GET['checkbox_shirt'] == 'yes') echo 'checked'; ?> >
						<span class="checkmark"></span>
					</label>
				</span>
						
				<span class="line">
					<label class="container" >Polo Shirt
						<input type="checkbox" name="checkbox_polo_shirt" value="yes" <?php if ($_GET['checkbox_polo_shirt'] == 'yes') echo 'checked'; ?> >
						<span class="checkmark"></span>
					</label>
				</span>
	
				<span class="line">
					<label class="container" >Trousers
						<input type="checkbox" name="checkbox_trousers" value="yes" <?php if ($_GET['checkbox_trousers'] == 'yes') echo 'checked'; ?> >
						<span class="checkmark"></span>
					</label>
				</span>
	
				<span class="line">
					<label class="container" >Skirt
						<input type="checkbox" name="checkbox_skirt" value="yes" <?php if ($_GET['checkbox_skirt'] == 'yes') echo 'checked'; ?> >
						<span class="checkmark"></span>
					</label>
				</span>
	
				<span class="line">
					<label class="container" >Check Dress
						<input type="checkbox" name="checkbox_check_dress" value="yes" <?php if ($_GET['checkbox_check_dress'] == 'yes') echo 'checked'; ?> >
						<span class="checkmark"></span>
					</label>
				</span>
	
				<span class="line">
					<label class="container" >Tie
						<input type="checkbox" name="checkbox_tie" value="yes" <?php if ($_GET['checkbox_tie'] == 'yes') echo 'checked'; ?> >
						<span class="checkmark"></span>
					</label>
				</span>
			
				<!-- Uniform Colours -->

				<span class="line">
					<label for="blazer_colour">Blazer Colour:</label>
					<input type="text" name="blazer_colour" placeholder="Blazer Colour" value="<?php echo htmlentities($blazer_colour); ?>">
				</span>
						
				<span class="line">
					<label for="jumper_colour">Jumper Colour:</label>
					<input type="text" name="jumper_colour" placeholder="Jumper Colour" value="<?php echo htmlentities($jumper_colour); ?>">
				</span>
	
				<span class="line">
					<label for="cardigan_colour">Cardigan Colour:</label>
					<input type="text" name="cardigan_colour" placeholder="Cardigan Colour" value="<?php echo htmlentities($cardigan_colour); ?>">
				</span>
	
				<span class="line">
					<label for="shirt_colour">Shirt Colour:</label>
					<input type="text" name="shirt_colour" placeholder="Shirt Colour" value="<?php echo htmlentities($shirt_colour); ?>">
				</span>
	
				<span class="line">
					<label for="polo_shirt_colour">Polo Shirt Colour:</label>
					<input type="text" name="polo_shirt_colour" placeholder="Polo Shirt Colour" value="<?php echo htmlentities($polo_shirt_colour); ?>">
				</span>
	
				<span class="line">
					<label for="trousers_colour">Trousers Colour:</label>
					<input type="text" name="trousers_colour" placeholder="Trousers Colour" value="<?php echo htmlentities($trousers_colour); ?>">
				</span>
	
				<span class="line">
					<label for="skirt_colour">Skirt Colour:</label>
					<input type="text" name="skirt_colour" placeholder="Skirt Colour" value="<?php echo htmlentities($skirt_colour); ?>">
				</span>
	
				<span class="line">
					<label for="check_dress_colour">Check Dress Colour:</label>
					<input type="text" name="check_dress_colour" placeholder="Check Dress Colour" value="<?php echo htmlentities($check_dress_colour); ?>">
				</span>
	
				<span class="line">
					<label for="tie_colour">Tie Colour:</label>
					<input type="text" name="tie_colour" placeholder="Tie Colour" value="<?php echo htmlentities($tie_colour); ?>">
				</span>
	
				<span class="line">
					<label for="tie_trim">Tie Trim:</label>
					<input type="text" name="tie_trim" placeholder="Tie Trim" value="<?php echo htmlentities($tie_trim); ?>">
				</span>
				
				<span class="line">
					<button type="submit" class="button button-sidebar" >Submit</button>
				</span>
				
			</form>
		</div>
	 
	 <!-- (button, Puglia and Bhayani, 2020) -->
	<script>
		function toggleSidebar() {
			var e = document.getElementById("searchSidebar");
			if (e.style.width == '320px')
				//close sidebar
			{
				document.getElementById("searchSidebar").style.width = "0";
				document.getElementById("main").style.marginLeft = "0";
				document.getElementById("float").style.marginLeft = "0px";
				document.getElementById("footer").style.marginLeft = "0px";
			}
			else 
			{
				//open sidebar
				document.getElementById("searchSidebar").style.width = "320px";
				document.getElementById("main").style.marginLeft = "320px";
				document.getElementById("float").style.marginLeft = "320px";
				document.getElementById("footer").style.marginLeft = "320px";
				
			}		
		}
		
		//if screen is 370px or less, alt close button script
		function closeSidebar() {
			document.getElementById("searchSidebar").style.width = "0";
			document.getElementById("main").style.marginLeft = "0";
			document.getElementById("float").style.marginLeft = "0px";
			document.getElementById("footer").style.marginLeft = "0px";
		}

		function validateForm() {
		
			// get text input values
			var Lettering = document.forms["form"]["lettering_text"].value;
			var EmblemText = document.forms["form"]["emblem_text"].value;
			var BlazerColour = document.forms["form"]["blazer_colour"].value;
			var JumperColour = document.forms["form"]["jumper_colour"].value;
			var CardiganColour = document.forms["form"]["cardigan_colour"].value;
			var ShirtColour = document.forms["form"]["shirt_colour"].value;
			var PoloShirtColour = document.forms["form"]["polo_shirt_colour"].value;
			var TrousersColour = document.forms["form"]["trousers_colour"].value;
			var SkirtColour = document.forms["form"]["skirt_colour"].value;
			var CheckDressColour = document.forms["form"]["check_dress_colour"].value;
			var TieColour = document.forms["form"]["tie_colour"].value;
			var TieTrim = document.forms["form"]["tie_trim"].value;
			
			//error message
			var errormessage = "Text inputs cannot contain white space. \n \nPlease remove from these text inputs: ";
			var error = 1;
			
			//check user text box inputs, if contains whitespace dont submit form and add control name to error output.
			if ( /\s/.test(Lettering)) {
				errormessage = errormessage + "Lettering, ";
				error = 0;
			}
			
			if ( /\s/.test(EmblemText)) {
				errormessage = errormessage + "Emblem Text, ";
				error = 0;
			}
			
			if ( /\s/.test(BlazerColour)) {
				errormessage = errormessage + " Blazer Colour, ";
				error = 0;
			}
			
			if ( /\s/.test(JumperColour)) {
				errormessage = errormessage + "Jumper Colour, ";
				error = 0;
			}	

			
			if ( /\s/.test(CardiganColour)) {
				errormessage = errormessage + "Cardigan Colour, ";
				error = 0;
			}

			if ( /\s/.test(ShirtColour)) {
				errormessage = errormessage + "Shirt Colour, ";
				error = 0;
			}	
			
			if ( /\s/.test(PoloShirtColour)) {
				errormessage = errormessage + "Polo Shirt Colour, ";
				error = 0;
			}
			
			if ( /\s/.test(TrousersColour)) {
				errormessage = errormessage + "Trousers Colour, ";
				error = 0;
			}
			
			if ( /\s/.test(SkirtColour)) {
				errormessage = errormessage + "Skirt Colour, ";
				error = 0;
			}
			
			if ( /\s/.test(CheckDressColour)) {
				errormessage = errormessage + "Check Dress Colour, ";
				error = 0;
			}
			
			if ( /\s/.test(TieColour)) {
				errormessage = errormessage + "Tie Colour, ";
				error = 0;
			}
			
			if ( /\s/.test(TieTrim)) {
				errormessage = errormessage + "Tie Trim";
				error = 0;
			}			
			
			//show error message if error, and stop form submission
			if ( error == 0 ) {
				alert(errormessage);
				return false
			}
		}
		</script

	<!-- holds main page content -->
	<div id="main">
	
		<div class="float">
			<button class="sidebar-toggle" onclick="toggleSidebar()">&#9776; </button>
		</div>
		
		<div class="content-wrapper">

			<h1> <a href=index.html> School Uniform Database </a> </h1>
				
				<!-- Provide table -->
				
				<div class="Rtable Rtable--5cols Rtable--collapse">
				
				<!-- Provide table headers -->
				
					<div class="Rtable-cell Rtable-cell--header"><h4>School</h4></div>
					<div class="Rtable-cell Rtable-cell--header"><h4>Address</h4></div>
					<div class="Rtable-cell Rtable-cell--header"><h4>Phone</h4></div>
					<div class="Rtable-cell Rtable-cell--header"><h4>Badge</h4></div>
					<div class="Rtable-cell Rtable-cell--header"><h4>Uniform</h4></div>
					
					
					<!-- Loop through all query results -->
					<?php
					
					//while loop to go through all results from the sql query
					while($data=$query->fetch(PDO::FETCH_ASSOC)){
					echo 	'<div class="Rtable-cell Rtable-cell--head"><h4>' 			. $data['School'] . 					'</h4></div>' .
							'<div class="Rtable-cell"><center>'							. $data['Address'] . 					'</center></div>' .
							'<div class="Rtable-cell"><center>' 						. $data['Telephone_Number'] . 			'</center></div>' .
							'<div class="Rtable-cell"><center>' 						. $data['School_badge'] . 				'</center></div>' .
							'<div class="Rtable-cell Rtable-cell--foot"><center>' 		. $data['School_uniform_description'] . '</center></div>';
						
					}
					//close connection to database
					$conn = null;
					?>
				
				</div>				
		</div>	
		<footer class="footer">Teesside University 2020 BETA</footer>
	</div>
	

		

</html>

<!-- References

button, S., Puglia, P. and Bhayani, P., 2020. Sidebar Navigation Toggle With Single Button. [online] Stack Overflow. Available at: <https://stackoverflow.com/questions/37675017/sidebar-navigation-toggle-with-single-button> [Accessed 14 May 2020].

W3schools.com. 2020. How To Create A Collapsed Sidebar. [online] Available at: <https://www.w3schools.com/howto/howto_js_collapse_sidebar.asp> [Accessed 14 May 2020].

Vasiljevski.com. 2020. How To Set The Selected Option Of <Select> Tag From The PHP – Vasiljevski Nikola. [online] Available at: <https://www.vasiljevski.com/blog/php/how-to-set-the-selected-option-of-select-tag-from-the-php/> [Accessed 14 May 2020].

PHP?, H., 2020. How Can I Set The Value Of A Textbox Through PHP?. [online] Stack Overflow. Available at: <https://stackoverflow.com/questions/1484816/how-can-i-set-the-value-of-a-textbox-through-php> [Accessed 14 May 2020].


-->