<?php

header("Content-Type: application/json; charset=UTF-8"); 

function get_ad_list() {
    $result_trans = array();
    $connect=new mysqli('https://ogiebooks.com','root','0g!ebook$','testdb') or die('connection error');
    $connect->set_charset('utf8');

    $liste_eleves='SELECT `id`, `name`, `title`, `description` FROM books WHERE 1 ORDER BY FIELD(`paid`, 1) DESC, `id` DESC LIMIT 6';

    $stmtfind_race= $connect->stmt_init();
    $stmtfind_race->prepare($liste_eleves) ;
    $stmtfind_race->bind_result($id, $name, $title, $description);
    $stmtfind_race->execute();
    $stmtfind_race->store_result();
    $numRows = $stmtfind_race->num_rows;
     while ( $stmtfind_race->fetch() ) {
      # code...
      $result_trans [] = array("id"=>$id,"name" => $name,"title" => $title, "desc" => $description);
    }
    return $result_trans;
}

    $value = get_ad_list(); 

    echo json_encode($value,JSON_PRETTY_PRINT) ;
?>