<?php
// autoload.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($className) {
    // 1. Strip out the 'Projects\FINALPRODUCT\' prefix (22 characters)
    if (strpos($className, 'Projects\\FINALPRODUCT\\') === 0) {
        $className = substr($className, 22);
    }
    
    // 2. Convert remaining backslashes to system directory separators
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    
    // 3. Check and require the file relative to the autoload.php location
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    
    return false;
});



?>