<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <?php 
            include 'inc/config.php';
            include 'inc/meta-header.php';
        ?>             
        <title>Editor de Metadados</title>
    </head>
    <body>
        <a href="index.php">Voltar ao início</a>
        <div class="uk-container">  

            <?php            
            
            if (!empty($_POST)) {
                
                if (isset($_POST["_id"])) {
                    $id = $_POST["_id"];
                    unset($_POST["_id"]);                    
                    $result = $collection->updateOne(array('_id' => $id ), array('$set' => $_POST), array('upsert'=>true) );
                    echo 'Documento editado com sucesso';
                    //var_dump($result);
                    $item = (array)$collection->findOne(['_id' => $id ]);
                } else {
                    $sha256 =  hash('sha256', ''.$_POST["title"].'');
                    $_POST["_id"] = $sha256;                    
                    //$result = $collection->insertOne( [ $_POST ] );
                    $result = $collection->updateOne(array('_id' => $sha256 ), array('$set' => $_POST), array('upsert'=>true) );
                    echo "Documento inserido com o ID '.$sha256.'";                
                    $item = (array)$collection->findOne(['_id' => $sha256 ]);                    
                    
                }

                
            } else {
        
                switch ($_GET["tarefa"]) {
                    case "new":                        
                        break;
                    case "edit":
                        $item = (array)$collection->findOne(['_id' => $_GET["id"] ]);
                        break;
                    case "delete":
                        $delete = $collection->deleteOne(['_id' => $_GET["id"] ]);
                        echo "Documento excluído!";
                        break;
                }
            }

            ?>
<h2>Editor de metadados</h2>


        <form class="uk-form-horizontal uk-margin-large" method="post" action="editor.php">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">Editar metadados</legend>
                <?php if (isset($item["_id"])): ?>
                    <?php $id = $item["_id"]; ?>                
                    <input type="hidden" name="_id" value="<?php echo $item["_id"]; ?>">
                <?php endif; ?>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-horizontal-text">Título</label>
                    <div class="uk-form-controls">
                        <?php if (!isset($_GET["tarefa"])) {$_GET["tarefa"] = "";} ?>
                            <?php if ($_GET["tarefa"] == "new" || $_GET["tarefa"] == "delete") :?>
                                <textarea class="uk-textarea" name="title"></textarea>
                            <?php else: ?>
                                <textarea class="uk-textarea" name="title"><?php echo $item["title"]; ?></textarea>
                            <?php endif; ?>
                    </div>    
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-horizontal-text">Ano</label>
                    <div class="uk-form-controls">
                        <?php if ($_GET["tarefa"] == "new" || $_GET["tarefa"] == "delete") :?>
                            <textarea class="uk-textarea" name="year"></textarea>
                        <?php else: ?>
                            <textarea class="uk-textarea" name="year"><?php echo $item["year"]; ?></textarea>
                        <?php endif; ?>
                        
                    </div>    
                </div>    
            </fieldset>
            <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Salvar</button>
        </form>    
        <form>
            <input type="hidden" name="id" value="<?php echo $id["oid"]; ?>">
            <input type="hidden" name="tarefa" value="delete">
            <button class="uk-button uk-button-danger">Excluir registro</button>
        </form>    
        </div> 
    </body>
</html>    