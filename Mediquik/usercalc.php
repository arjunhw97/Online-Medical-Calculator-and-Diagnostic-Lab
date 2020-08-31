
<!DOCTYPE html>
<html>
<head>
	<title>Medical Calculators</title>
   <link rel="stylesheet" type="text/css" href="css/calcu.css">


</head>
<body>
<button onclick="window.location.href = 'profile.php'" class ="btn">PROFILE</button>
<form method="post" action="">	
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<ul id="myUL">
  <li><a href="ucalc/UA1.php">Arterial Oxygen Content</a></li>
  <li><a href="ucalc/UA2.php">Anion Gap Calculator</a></li>
  <li><a href="ucalc/UA3.php">Asymptomatic Myeloma Prognosis</a></li>
  <li><a href="ucalc/UA4.php">AST to Platelet Ratio Index (APRI)</a></li>

  <li><a href="ucalc/UB1.php">BMR Calculator</a></li>
  <li><a href="ucalc/UB2.php">Bicarbonate Deficit</a></li>


  <li><a href="ucalc/UC1.php">Corrected Calcium Calculator</a></li>
  <li><a href="ucalc/UC2.php">Creatinine Clearance (Cockcroft-Gault Equation)</a></li>
  <li><a href="ucalc/UC3.php">Corrected QT Interval (QTc)</a></li>
  <li><a href="ucalc/UC4.php">Canadian Syncope Risk Score</a></li>

  <li><a href="ucalc/UD1.php">DASH Prediction Score for Recurrent VTE</a></li>
  <li><a href="ucalc/UD2.php">DRAGON Score for Post-TPA Stroke Outcome</a></li>
  <li><a href="ucalc/UD3.php">D'Amico Risk Classification for Prostate Cancer</a></li>

  <li><a href="ucalc/UE1.php">EUTOS Score for Chronic Myelogenous Leukemia (CML)</a></li>

  <li><a href="ucalc/UF1.php">Fractional Excretion of Sodium (FENa)</a></li>

  <li><a href="ucalc/UG1.php">Glasgow-Imrie Criteria for Severity of Acute Pancreatitis</a></li>

  <li><a href="ucalc/UH1.php">HOMA-IR (Homeostatic Model Assessment for Insulin Resistance)</a></li>

  <li><a href="ucalc/UI1.php">International Prognostic Index for Chronic Lymphocytic Leukemia (CLL-IPI)</a></li>

  <li><a href="ucalc/UK1.php">Kruis Score for Diagnosis of Irritable Bowel Syndrome</a></li>

  <li><a href="ucalc/UL1.php">LDL Calculated</a></li>

  <li><a href="ucalc/UM1.php">Mean Arterial Pressure (MAP)</a></li>

  <li><a href="ucalc/UN1.php">New Orleans/Charity Head Trauma/Injury Rule</a></li>

  <li><a href="ucalc/UO1.php">Oxygenation Index</a></li>

  <li><a href="ucalc/UP1.php">Pediatric Appendicitis Score </a></li>

  <li><a href="ucalc/UQ1.php">qSOFA (Quick SOFA) Score for Sepsis</a></li>
     
  <li><a href="ucalc/UR1.php">RAPID Score for Pleural Infection</a></li>

  <li><a href="ucalc/US1.php">Serum Osmolality/Osmolarity</a></li>

  <li><a href="ucalc/UT1.php">THRIVE Score for Stroke Outcome</a></li>

  <li><a href="ucalc/UU1.php">US (MEDPED) Diagnostic Criteria for Familial Hypercholesterolemia (FH)</a></li>

  <li><a href="ucalc/UV1.php">Vancouver Chest Pain Rule</a></li>

  <li><a href="ucalc/UW1.php">Wells' Criteria for DVT</a></li>

 
</ul>
<script>
function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

</div>
<div class="sidenav">
  <a href="home.php">Home</a>
  <a href="usercalc.php">Medical Calculator</a>
  <a href="fused.php">Frequently Used</a>
  <a href="olab.php">Online Lab</a>
  <a href="inventory.php">MyTests</a>
  <a href="logout.php">Logout</a>
</div>
</form>
</body>
</html>