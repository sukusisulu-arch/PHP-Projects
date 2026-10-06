<?php
    if(isset($_POST['login'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
            
            $validName ="Suku";
            $validPassword = "Mawa";
            
            $functional ;

            $functional = '<p style="color:green;">LoginForm: Working</p>';
    }else{
        $functional = '<p style="color:red;">LoginForm: Not Working</p>';
    }
?>
