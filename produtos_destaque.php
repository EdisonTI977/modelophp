<?php 
include 'conn/connect.php';
$lista = $conn->query("select * from vw_produtos where destaque = 'Sim' ");
$rows_produto = $lista->fetch_assoc();
$num_linhas = $lista->num_rows;


?>

<!-- Mostrar se a consulta retornar vazio -->
<?php
if ($num_linhas == 0) { ?><!--agora de baixo dentro desse if vai mostrar na tela!-->
    <h2 class="breadcrumb alert-danger">Não há produtos em destaque!</h2>
<?php } ?>
<!-- mostrar se a consulta retornou produtos -->
<?php if ($num_linhas > 0)/*ele pergubta se o numeros de linha é maior que zero, se caso não for ele não ira mostrar os destaques*/ { ?>
    <h2 class="breadcrumb alert-danger">
        Destaques
    </h2>
    <div class="row"><!--  LINHA  -->
        <?php do { //faça enquanto ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail ">
                <a href="produto_detalhes.php?id=<?php echo $row_produto['id'];//ele vai puxar o id dos produtos em destaque?>"><!--quando clicar ele vai trazer até o produto-->
                    <img src="images/<?php echo $row_produto['imagem']?>" alt="" class="img-responsive img-rounded">
                </a>
                <div class="caption text-right bg-danger">
                    <h3 class="text-danger">
                        <strong><?php echo $row_produto['descricao']?></strong>
                    </h3>
                    <p class="text-warning">
                        <strong><?php echo mb_strimwidth($row_produto['resumo'],0,40,'...')//A função mb_strimwidth() no PHP é usada para truncar uma string até uma largura específica (em caracteres) e, opcionalmente, adicionar um sufixo (como uma elipse) caso a string ultrapasse essa largura.?></strong>
                    </p>
                    <p class="text-left">
 
                    </p>
                    <p>
                        <button class="btn btn-default disabled" role="button" style="cursor: default;">
                            <?php echo "R$ ".number_format($row_produto['valor'],2,',','.');//ele mostra 2 que são os centavos nesse caso e no lugar da virgula ele vai substituir de , para .?>
                        </button>
                        <?php echo $row_produto['id']?>
                        <a href="produto_detalhes.php?id=">
                            <span class="hidden-xs">Saiba mais..</span>
                            <span class="hidden-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                    </p>
                </div>
            </div>
 
        </div>
<?php }while($row_produto=$lista->fetch_assoc());//se rows produtos lista retornar uma proxima linha se retornar falso ele para?>
    </div>
<?php } ?>
