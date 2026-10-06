<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .grid-container {
            display: grid;
            /* Creates 3 columns: first is 200px, second takes remaining space, third is 150px */
            grid-template-columns: 200px 1fr 150px; 
            
            /* Creates 2 rows: heights are automatically determined by content */
            grid-template-rows: auto auto; 
            
            /* Adds a 20px gap between all rows and columns */
            gap: 20px; 
        }
        
        .flex-container {
  display: flex;
  flex-direction: row; /* Default value */
  justify-content: space-between; /* Spreads items evenly across the row */
  gap: 15px;
}

.flex-container {
  display: flex;
  flex-direction: column; 
  gap: 15px;
}



    </style>
</head>
<body>


<div class="flex-container">
  <div class="item">A</div>
  <div class="item">B</div>
  <div class="item">C</div>
</div>


    
    <?php
        $item = '<span>*</span><br>';
        
        for ($i = 1; $i <= 3; $i++) {
            echo "i".$i.'<br>'; 
            if($i = 2){
                for ($x = 1; $x <= 3; $x++) {
                    echo "x".$x.'<br>'; 
                }
            }
            
        }
    ?>
</body>
</html>