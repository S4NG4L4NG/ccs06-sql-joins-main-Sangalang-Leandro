<html>
<?php
require "config.php";

use App\employee;
use App\employees;

$emps = employees::list();


echo "<table border='1' cellpadding='5' id='myTable'>";
$keys = array_keys($emps);

for ($i = 0; $i < count($emps); $i++) {
    echo "<tr>";

    foreach ($emps[$keys[$i]] as $key => $value) {
        if ($key === "emp_no") {
            echo "<td><a href='#' class='submitLink'>" . $value . "</a></td>";
        } else {
            echo "<td>" . $value . "</td>";
        }
    }

    echo "</tr>";
}

echo "</table>";
?>
[9:09 PM]
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
    form.action = "employee_salary.php"; 

    var input = document.createElement("input");
    input.type = "hidden";
    input.name = "emp_no"; 
    input.value = valueToPost; 

    form.appendChild(input);
    document.body.appendChild(form);

    form.submit();
  });
}
  </script>
</html>