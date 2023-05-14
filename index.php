<html>
<?php

require "config.php";

use App\depart;
use App\employees;

$depts = depart::list();

echo "<table border='1' cellpadding='5' id='myTable'>";

$keys = array_keys($depts);

for($i = 0; $i < count($depts); $i++) {
    
    echo "<tr>";
    
    foreach($depts[$keys[$i]] as $key => $value) {
      if ($key === "dept_name") {
        echo "<td><a href='#' class='submitLink'>" . $value . "</a></td>";
    } else {
        echo "<td>" . $value . "</td>";
    }
          
}
    echo "</tr>";   
}
?>
 <script>
    window.onload = function() {
      
      var table = document.getElementById("myTable");


      var columnCount = table.rows[0].cells.length;

      
      for (var i = columnCount - 1; i >= 0; i -= 2) {

        for (var j = 0; j < table.rows.length; j++) {
          table.rows[j].deleteCell(i);
        }
      }
    };
  </script>
  <script>
  var links = document.getElementsByClassName("submitLink");

  // Attach event listeners to each link
  for (var i = 0; i < links.length; i++) {
  links[i].addEventListener("click", function(event) {
  event.preventDefault(); 
  
  var valueToPost = this.textContent; 
  
  var form = document.createElement("form");
  form.method = "post";
  form.action = "employee_scan.php"; 
  
  var input = document.createElement("input");
  input.type = "hidden";
  input.name = "dept_name"; 
  input.value = valueToPost; 
  
  form.appendChild(input);
  document.body.appendChild(form);
  
  form.submit(); 
});
}
  </script>
</html>