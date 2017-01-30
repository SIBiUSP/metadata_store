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
        <div class="uk-container">  

            <?php

            switch ($_GET["tarefa"]) {
                case "novo":
                    echo "novo";
                    $result = $collection->insertOne( [ '_id' => '999999999', 'titulo' => 'Titulo', 'ano' => '2017' ] );
                    echo "Inserted with Object ID '{$result->getInsertedId()}'";
                    break;
                case "editar":
                    $result = $collection->find( [ '_id' => ''.$_GET["id"].'' ] );
                    $result_array = $result->toArray();
                    break;
                case "excluir":
                    echo "excluir";
                    echo $_GET["id"];
                    break;
            }

            ?>
            <h2>Editor de metadados</h2>
            <form class="uk-form-horizontal uk-margin-large">
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Editar metadados</legend>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">Título</label>
                        <div class="uk-form-controls">    
                            <textarea class="uk-textarea" name="titulo"><?php echo $result_array[0]["titulo"]; ?></textarea>
                        </div>    
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">Ano</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-textarea" name="ano"><?php echo $result_array[0]["ano"]; ?></textarea>
                        </div>    
                    </div>    
                </fieldset>
                <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Salvar</button>
            </form>
            <button class="uk-button uk-button-danger">Excluir registro</button>
        </div> 
    </body>
</html>    