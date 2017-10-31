<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
    <head>
    <?php 
        include 'inc/config.php';
        include 'inc/meta-header.php';
       
        switch ($_GET["task"]) {
            case "new":                        
                break;
            case "edit":
                $item = (array)$collection->findOne(['_id' => $_GET["id"] ]);
                break;
            case "delete":
                $delete = $collection->deleteOne(['_id' => $_GET["id"] ]);
                echo '<div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>Documento excluído!</p>
                </div>';
                break;
        }
    ?>             
    <title>Editor de Metadados</title>
    </head>
    <body>
    <div class="uk-container">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="index.php">Voltar ao início</a></li>
                </ul>
            </div>
        </nav>
        <h2>Editor de metadados</h2>
        <div class="uk-grid-small uk-grid" uk-grid="">         

        


    <?php if(empty($_GET["type"])) : ?>

        <form class="uk-form-horizontal uk-margin-large" method="get" action="editor.php">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">Selecionar tipo de documento</legend>
                <input type="hidden" name="task" value="new">
                <div class="uk-margin">
                    <select class="uk-select" name="type">
                        <option value="article">Artigo de periódico</option>
                        <option value="book">Livro</option>
                    </select>
                </div>    
                <button class="uk-button">Selecionar</button>
            </fieldset>
        </form> 

    <?php else : ?>

        <?php if($_GET["type"] == "article") : ?>

        <div class="uk-width-3-4@s"> 

            <form class="uk-form-horizontal uk-margin-large" method="post" action="updatedb.php">
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Dados da obra</legend>
                    <?php if (isset($item["_id"])): ?>
                        <?php $id = $item["_id"]; ?>                
                        <input type="hidden" name="_id" value="<?php echo $item["_id"]; ?>">
                    <?php endif; ?>        
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">Título</label>
                        <div class="uk-form-controls">
                            <textarea class="uk-textarea" name="name"></textarea>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">Data de publicação (AAAA)</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" data-validation="date" data-validation-format="yyyy" type="text" name="datePublished">
                        </div>    
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">Idioma</label>
                        <div class="uk-form-controls">
                        <select class="uk-select" name="language">
                            <option value="Português">Português</option>
                            <option value="Inglês">Inglês</option>
                        </select> 
                        </div>    
                    </div>                          
                </fieldset>
                </a><a name="imprenta"></a>
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Dados da publicação fonte</legend>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">Título da publicação</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-horizontal-text" type="text" name="isPartOf.name">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">Editora</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-horizontal-text" type="text" name="publisher">
                        </div>
                    </div> 
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">Local de publicação</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-horizontal-text" type="text" name="publisher.organization.location">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-horizontal-text">ISSN</label>
                        <div class="uk-form-controls">
                            <input class="uk-input" id="form-horizontal-text" type="text" name="issn">
                        </div>
                    </div>                                                                               
                </fieldset>
                <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Salvar</button>
            </form>
        </div>
        <div class="uk-width-1-4@s">
            <p><a class="uk-button uk-button-primary" href="#imprenta" uk-scroll>Scroll down</a></p>
        </div>            
        <?php endif; ?>

<?php endif; ?>

<?php if($_GET["task"] == "delete") : ?>
    <form>
        <input type="hidden" name="id" value="<?php echo $item["_id"]; ?>">
        <input type="hidden" name="task" value="delete">
        <button class="uk-button uk-button-danger">Excluir registro</button>
    </form>    
    </div>
<?php endif; ?>


</div>


<script>
    $.validate({
    lang : 'pt',
    modules : 'date'
    });
</script> 
</body>
</html>