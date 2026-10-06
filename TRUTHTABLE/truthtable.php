<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      *{
        padding:0;
        margin:0;
      }
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse; /* Prevents double borders between cells */
          width:100%; /* Adds breathing room inside cells */

        }
        th, td {
          padding: 20px;
          width:100vw; /* Adds breathing room inside cells */
        }
        div{
          justify-content:center;
        }

    </style>
    
</head>
<body>
    <div>
      
    <div style="background:magenta;height:10vh;width:100vw">
      <?php
          $var1;
          $var2;
         function result ($logicalOperator){
            if($logicalOperator == 'AND'){
                return $var1 && $var2;
            }elseif ($logicalOperator == 'OR') {
                return $var1 || $var2;
            }
         }
          
          
          
        ?>
    </div>
      
        
        <table>
            <!-- The header row -->
            <tr>
              <th>P </th>
              <th>Q</th>
              <th>P AND Q <?php $logicalOperator = 'AND';?></th>
              <th>P OR Q <?php $logicalOperator = 'OR';?></th>
            </tr>
            <hr>
            
            <!-- Data Row 1 -->
            <tr>
              <td>T <?php $var1 = true;?></td>
              <td>T <?php $var2 = true;?></td>
              <td><?php echo result;?></td>
              <td><?php echo $result;?></td>
            </tr>
            
            <!-- Data Row 2 -->
            <tr>
              <td>T<?php $var1 = true;?></td>
              <td>F<?php $var2 = false;?></td>
              <td>2<?php echo $result;?></td>
              <td>2<?php echo $result;?></td>
            </tr>
            
            <!-- Data Row 3 -->
            <tr>
              <td>F<?php $var1 = false;?></td>
              <td>T<?php $var2 = true;?></td>
              <td>3<?php echo $result;?></td>
              <td>3<?php echo $result;?></td>
            
            </tr>
            
            <!-- Data Row 4 -->
            <tr>
            <td>F<?php $var1 = false;?></td>
              <td>T<?php $var2 = true;?></td>
              <td>3<?php echo $result;?></td>
              <td>3<?php echo $result;?></td>
            </tr>
            
          </table>
          
    </div>
    
   


    
</body>
</html>