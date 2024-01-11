<!doctype html>

<html lang="pl">
<head>
  <meta charset="utf-8">

  <title>Simple java script demo</title>
  <meta name="description" content="Demo site">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
  <div class="placeholder">Formularz do kolorowania tekstu</div>
  <form action="#" method="get">
	<div>
    		<label for="say">What greeting do you want to say?</label>
    		<input name="say" id="say" value="Hi">
  	</div>
	<div>
		<label for="color">Choose text color</label>
		<select name="color">
  			<option value="red">Red</option>
  			<option value="blue">Blue</option>
  			<option value="green">Green</option>
  			<option value="Black">Black</option>
		</select>
	</div>
	<div>
    		<button>Send my greetings</button>
  	</div>
  </form>
<br/>
<?php
if (isset($_GET['say']) and isset($_GET['color'])){
 	$say = htmlspecialchars($_GET['say']);
  	$color = $_GET['color'];

  	echo  '<div style="color:'.$color.'">'.$say.' in color '.$color;
}
?>
</body>
</html>