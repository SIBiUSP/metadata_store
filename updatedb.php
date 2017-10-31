<?php

include 'inc/config.php';
include 'inc/meta-header.php';

print_r($_POST);


if (!empty($_POST)) {
                
    if (isset($_POST["_id"])) {
        $id = $_POST["_id"];
        unset($_POST["_id"]);                    
        $result = $collection->updateOne(array('_id' => $id ), array('$set' => $_POST), array('upsert'=>true) );
        
        echo '<div class="uk-alert-success" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>Documento editado com sucesso.</p>
                </div>';
        $item = (array)$collection->findOne(['_id' => $id ]);
    } else {
        $sha256 =  hash('sha256', ''.$_POST["name"].'');
        $_POST["_id"] = $sha256;                    
        //$result = $collection->insertOne( [ $_POST ] );
        $result = $collection->updateOne(array('_id' => $sha256 ), array('$set' => $_POST), array('upsert'=>true) );
        echo "Documento inserido com o ID '.$sha256.'";                
        $item = (array)$collection->findOne(['_id' => $sha256 ]);                    
        
    }
                
} 

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>