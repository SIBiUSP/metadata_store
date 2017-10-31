<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
        <?php 
            include 'inc/config.php';
            include 'inc/meta-header.php';
        ?>        
            <title>Módulo de Metadados</title>
    </head>
    <body>
        <div class="uk-container">        
            <?php 

                $result = $collection->find( [ ] );
                foreach ($result as $entry) {                    
                    echo ''.$entry['_id'].': '.$entry['name'].' - '.$entry['datePublished'].' - <a href="editor.php?task=edit&id='.$entry['_id'].'">Editar</a> - <a href="editor.php?task=delete&id='.$entry['_id'].'">Excluir</a><br/>';
                }        

            ?>

            <p><a href="editor.php?task=new">Novo registro</a></p>
        </div>    
    </body>


</html>     