<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <h1>The Calculator</h1><br>

    <div class="output-container">
        <div class="output" id="output">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){                $num1 = $_POST["num1"];
                $num2 = $_POST["num2"];
                $operator = $_POST["operator"];
                $result = "";
                
                switch ($operator) {
                    case "+": $result = $num1 + $num2; break;
                    case "-": $result = $num1 - $num2; break;
                    case "/": $result = $num1 / $num2; break;
                    case "*": $result = $num1 * $num2; break;
                } 
                echo "<h1>Here is You Answer: ".$num1." ".$operator." ".$num2." = ".$result."</h1>";
            } 
            
        
        ?>
        </div>
    </div>
    
    <form method="POST" action="calculator.php">
        <input type="number" name="num1" step="any" placeholder="Enter a Number" required><br><br>
        <input type="number"  name="num2" step="any" placeholder="Enter a Number" required><br><br>
        
        <h6>Choose Operator Sign</h6>
        <select name="operator">
            <option value="+">add</option>
            <option value="-">subtract</option>
            <option value="/">divide</option>
            <option value="*">multiply</option>
        </select><br><br>
        
        <input type="submit" value="Calculate" name="submit" onclick="hideshow()">
        
    </form>
    
      
</body>
        <style>
            
            body{
                border:solid;
                justify-items:center; 
                padding:30px;
            }
            h6{
                display:block;
            }
            .output-container{
                border:solid;
                margin-bottom:30px;
                height: 100px;
                overflow:hidden;
               
            }
            .output{
                display:none;
            
                
            }
        </style>
        
        <script>
          var output = document.getElementById('output');
          var outputContainer = document.getElementById('output-container');
            var display = 1;
            
            function hideshow(){
                if(display == 1){
                    output.style.display = 'block';
                    output.style.transition = '2s';
                    display = 0;
                }else{
                    display = 1;
                }
                
                setTimeout(function() {
                    if (output) {
                        output.style.display = "none"; // Shuts down/hides the element
                        outputContainer.innerHTML = "Closed Automatically";              }
                    }, 10000);
            }
        
           
                
           
        </script>
</html>