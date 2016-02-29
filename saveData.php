<?php
  $file_name = "data.txt";
  //faili sisu
  $entries_from_file = file_get_contents($file_name);
  //echo $entries_from_file;
  //string objektideks
  $entries = json_decode($entries_from_file);
  //var_dump($entries);
  // {"name":"romil"}
  //?name=nimi&ingridients=koostis
  if(isset($_GET["title"]) && isset($_GET["ingredients"])){
    //ei ole tuhjad
    if(!empty($_GET["title"]) && !empty($_GET["ingredients"])){
        //lihtne objekt
        $object = new StdClass();
        $object->title = $_GET["title"];
        $object->ingredients = $_GET["ingredients"];
        //lisan objekti massiivi
        array_push($entries, $object);
        //TEEN STRINGIKS
        $json_string = json_encode($entries);
        //salvestan faili ule, salvestan massiivi stringi kujul
        file_put_contents($file_name, $json_string);
    }
  }
  //trukin valja stringi kuju massiivi (voib-olla lisas midagi juurde)
  echo(json_encode($entries));
?>