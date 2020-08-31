<!DOCTYPE html>
<html>
<head>
	<title>Medical Calculators</title>
   <link rel="stylesheet" type="text/css" href="css/calcu.css">


</head>
<body>
<button onclick="window.location.href = 'index.php'" class ="btn">HOME</button>
<form method="post" action="">	
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<ul id="myUL">
  <li><a href="calcu/A1.php">Arterial Oxygen Content</a></li>
  <li><a href="calcu/A2.php">Anion Gap Calculator</a></li>
  <li><a href="calcu/A3.php">Asymptomatic Myeloma Prognosis</a></li>
  <li><a href="calcu/A4.php">AST to Platelet Ratio Index (APRI)</a></li>

  <li><a href="calcu/B1.php">BMR Calculator</a></li>
  <li><a href="calcu/B2.php">Bicarbonate Deficit</a></li>


  <li><a href="calcu/C1.php">Corrected Calcium Calculator</a></li>
  <li><a href="calcu/C2.php">Creatinine Clearance (Cockcroft-Gault Equation)</a></li>
  <li><a href="calcu/C3.php">Corrected QT Interval (QTc)</a></li>
  <li><a href="calcu/C4.php">Canadian Syncope Risk Score</a></li>

  <li><a href="calcu/D1.php">DASH Prediction Score for Recurrent VTE</a></li>
  <li><a href="calcu/D2.php">DRAGON Score for Post-TPA Stroke Outcome</a></li>
  <li><a href="calcu/D3.php">D'Amico Risk Classification for Prostate Cancer</a></li>

  <li><a href="calcu/E1.php">EUTOS Score for Chronic Myelogenous Leukemia (CML)</a></li>

  <li><a href="calcu/F1.php">Fractional Excretion of Sodium (FENa)</a></li>

  <li><a href="calcu/G1.php">Glasgow-Imrie Criteria for Severity of Acute Pancreatitis</a></li>

  <li><a href="calcu/H1.php">HOMA-IR (Homeostatic Model Assessment for Insulin Resistance)</a></li>

  <li><a href="calcu/I1.php">International Prognostic Index for Chronic Lymphocytic Leukemia (CLL-IPI)</a></li>

  <li><a href="calcu/K1.php">Kruis Score for Diagnosis of Irritable Bowel Syndrome</a></li>

  <li><a href="calcu/L1.php">LDL Calculated</a></li>

  <li><a href="calcu/M1.php">Mean Arterial Pressure (MAP)</a></li>

  <li><a href="calcu/N1.php">New Orleans/Charity Head Trauma/Injury Rule</a></li>

  <li><a href="calcu/O1.php">Oxygenation Index</a></li>

  <li><a href="calcu/P1.php">Pediatric Appendicitis Score </a></li>

  <li><a href="calcu/Q1.php">qSOFA (Quick SOFA) Score for Sepsis</a></li>
     
  <li><a href="calcu/R1.php">RAPID Score for Pleural Infection</a></li>

  <li><a href="calcu/S1.php">Serum Osmolality/Osmolarity</a></li>

  <li><a href="calcu/T1.php">THRIVE Score for Stroke Outcome</a></li>

  <li><a href="calcu/U1.php">US (MEDPED) Diagnostic Criteria for Familial Hypercholesterolemia (FH)</a></li>

  <li><a href="calcu/V1.php">Vancouver Chest Pain Rule</a></li>

  <li><a href="calcu/W1.php">Wells' Criteria for DVT</a></li>

 
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



</form>

</body>
</html>