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
                    echo $entry['_id'], ': ', $entry['titulo'], ': ', $entry['ano'],"<br/>";
                }        

            ?>

            <p><a href="editor.php?tarefa=novo">Novo registro</a></p>
            <p><a href="editor.php?tarefa=editar&id=999999999">Editar registro</a></p>
            <p><a href="editor.php?tarefa=excluir&id=999999999">Excluir registro</a></p>
        </div>    
    
    </body>

</html>     