<?php

    define('DBINFO', 'mysql:host=localhost;dbname=Graduation DB');
    define('DBUSER','root');
    define('DBPASS','');
    

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            echo '<script type="text/javascript">alert("you hired the student successfully!");window.location=\'hire_graduate.php\';</script>';
        }else{
            return '<script type="text/javascript">alert("please try again!");window.location=\'hire_graduate.php\';</script>';
        }
    }


?>