<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('phpadmin/test.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   }
?>
   