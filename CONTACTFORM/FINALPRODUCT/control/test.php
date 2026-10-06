<div style="display:non;">
 <?php 
    spl_autoload_register(function($className){
        $paths = ['control/','core/'];
        
        foreach ($paths as $path) {
            $file = $path.str_replace('\\','/'.$className).".php";
            if(file_exists($file)){
                require $file;
                return;
            }
        }
    });
?>