<?php

require("./header.php");
// primitive router
if(isset($_GET["__page__"])) {
    switch($_SERVER["REQUEST_METHOD"]) {
        case "GET":
            switch($_GET["__page__"]) {
                default:
                    
            }
            break;
        case "post":
            echo "post";
            break;
        default:
            echo "error";
            break;
    }
} else {
    echo "test";
}
require("./footer.php");

?>
