<?php
   try
   {
        
        $dsn = 'mysql:host=127.0.0.1;dbname=productHunt';
        $user = 'root';
        $password = '';
        $db = new PDO( $dsn, $user, $password);
   }
   catch (Exception $message){
        echo "ya un blem <br>" . "<pre>$message</pre>" ;
   }
   ?>