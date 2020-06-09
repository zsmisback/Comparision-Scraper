<?php

include 'getdatasingle.php';

?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <style>
  


  </style>
</head>
<body>

<div class='container' id='category_back' enctype="multipart/form-data">
<form name='art' method='post' id='article'>

<h3 id='user' class='text-center'>Comparision Scraper</h3>

<input type='text' id = 'cr1' name = 'cricketer1' class='form-control mb-4' placeholder = 'Enter the name of the first cricketer' value='<?php echo $cricket1; ?>'/>
<br>
<div class='form-group'>
Select the players country:
<select class='form-control' id='criccountry1' name='cricketcountry1'>
                  
<option value="southafrica">southafrica</option>
   <option value="zimbabwe">zimbabwe</option>
   <option value="westindies">westindies</option>
   <option value="afghanistan">afghanistan</option>
   <option value="bangladesh">bangladesh</option>
   <option value="india">india</option>
   <option value="pakistan">pakistan</option>
   <option value="srilanka">srilanka</option>
   <option value="australia">australia</option>
   <option value="newzealand">newzealand</option>
   <option value="england">england</option>
   <option value="ireland">ireland</option>
   <option value="botswana">botswana</option>
   <option value="cameroon">cameroon</option>
   <option value="gambia">gambia</option>
   <option value="ghana">ghana</option>
   <option value="kenya">kenya</option>
   <option value="lesotho">lesotho</option>
   <option value="malawi">malawi</option>
   <option value="mali">mali</option>
   <option value="morocco">morocco</option>
   <option value="mozambique">mozambique</option>
   <option value="namibia">namibia</option>
   <option value="nigeria">nigeria</option>
   <option value="rwanda">rwanda</option>
   <option value="seychelles">seychelles</option>
   <option value="sierraleone">sierraleone</option>
   <option value="sainthelena">sainthelena</option>
   <option value="swaziland">swaziland</option>
   <option value="tanzania">tanzania</option>
   <option value="uganda">uganda</option>
   <option value="zambia">zambia</option>
   <option value="argentina">argentina</option>
   <option value="bahamas">bahamas</option>
   <option value="belize">belize</option>
   <option value="bermuda">bermuda</option>
   <option value="brazil">brazil</option>
   <option value="canada">canada</option>
   <option value="caymanislands">caymanislands</option>
   <option value="chile">chile</option>
   <option value="costarica">costarica</option>
   <option value="falklandislands">falklandislands</option>
   <option value="mexico">mexico</option>
   <option value="panamu">panamu</option>
   <option value="peru">peru</option>
   <option value="suriname">suriname</option>
   <option value="usa">usa</option>
   <option value="bahrain">bahrain</option>
   <option value="bhutan">bhutan</option>
   <option value="china">china</option>
   <option value="hongkong">hongkong</option>
   <option value="iran">iran</option>
   <option value="kuwait">kuwait</option>
   <option value="malaysia">malaysia</option>
   <option value="maldives">maldives</option>
   <option value="myanmar">myanmar</option>
   <option value="nepal">nepal</option>
   <option value="oman">oman</option>
   <option value="qatar">qatar</option>
   <option value="saudiarabia">saudiarabia</option>
   <option value="singapore">singapore</option>
   <option value="thailand">thailand</option>
   <option value="uae">uae</option>
   <option value="cookislands">cookislands</option>
   <option value="fiji">fiji</option>
   <option value="indonesia">indonesia</option>
   <option value="japan">japan</option>
   <option value="pauanewguinea">pauanewguinea</option>
   <option value="philippines">philippines</option>
   <option value="samoa">samoa</option>
   <option value="southkorea">southkorea</option>
   <option value="vanuatu">vanuatu</option>
   <option value="austria">austria</option>
   <option value="belgium">belgium</option>
   <option value="bulgaria">bulgaria</option>
   <option value="croatia">croatia</option>
   <option value="cyprus">cyprus</option>
   <option value="czechrepublic">czechrepublic</option>
   <option value="denmark">denmark</option>
   <option value="estonia">estonia</option>
   <option value="finland">finland</option>
   <option value="france">france</option>
   <option value="germany">germany</option>
   <option value="gibraltar">gibraltar</option>
   <option value="greece">greece</option>
   <option value="guernsey">guernsey</option>
   <option value="hungary">hungary</option>
   <option value="isleofman">isleofman</option>
   <option value="israel">israel</option>
   <option value="italy">italy</option>
   <option value="jersey">jersey</option>
   <option value="luxembourg">luxembourg</option>
   <option value="malta">malta</option>
   <option value="netherlands">netherlands</option>
   <option value="norway">norway</option>
   <option value="portugal">portugal</option>
   <option value="romania">romania</option>
   <option value="russia">russia</option>
   <option value="scotland">scotland</option>
   <option value="serbia">serbia</option>
   <option value="slovenia">slovenia</option>
   <option value="spain">spain</option>
   <option value="sweden">sweden</option>
   <option value="turkey">turkey</option>
  
</select>
</div>

<br>



<p class='err' id='error'><?php echo $error; ?></p>
<button type="submit" id='comparebtn' class="btn btn-dark btn-block btn-lg" name='compare' >Submit</button>
</form>

<br>

</div>
<script>

</script>
</body>
</html>
</html>