<div id="page-wrapper">
    <div class="container-fluid">
        <?php
        if(!isset($_GET["acao"])=="listar"){
        ?>
        <div class="row">
            <!-- /.col-lg-12 -->
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        if(
                            isset($_GET["cod_serie"])
                        ){
                            echo "<H4>Alteração da Serie</H4>";
                            $cod_serie = $_GET["cod_serie"];
                        }else{
                            echo "<H4>Cadastro da Série</H4>";
                            $cod_serie = NULL;
                        }
                        ?>
                    </div>
                    <div class="panel-body">
                        <form action="./Controller/cadastroSerie.php" role="form" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <?php
                                        include("./Model/classeSerie.php");
                                        $objeto = new Serie();//classe
                                        echo $cod_serie;
                                        $retornoSerie = $objeto->listaSerieUm($cod_serie);//tras o vetor tipoSerie com os dados do
                                        foreach($retornoSerie as $valorSerie);
                                        ?>
                                        <input value="<?php if (isset($valorSerie["descricao"])) { echo $valorSerie["descricao"];} ?>" class="form-control" placeholder="Casdastre a Série" name="descricao">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-10">

                                    <?php
                                    if (!isset($_GET["cod_serie"])){
                                        ?>
                                        <input type="hidden" name="acao" value="cadastrar">
                                        <button type="submit" class="btn btn-default">GRAVAR</button>

                                        <?php
                                    }elseif (isset($_GET["cod_serie"])){
                                        ?>
                                        <input type="hidden" name="acao" value="alterar">
                                        <input type="hidden" name="cod_serie" value="<?php echo $cod_serie; ?>">
                                        <button type="submit" class="btn btn-default">ALTERAR</button>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <?php
    }elseif(isset($_GET["acao"])=="listar") {
        ?>

        <div class="row">
            <div class="col-lg-10">
                <div class="panel-body">

                    <a href="index.php?pagina=formsCadastroSerie.php">
                        <button type="button" class="btn btn-primary">Adicionar Serie </button>
                    </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registro das Séries Cadastradas
                    </div>
                    <!-- /.panel-heading -->

                    <?php
                    if (isset($_GET["mensagem"])) {
                        $mensagem = $_GET["mensagem"];

                        if ($mensagem == "sucesso") {
                            ?>
                            <div class="panel-body">
                                <div class="alert alert-success">
                                    Operação realizada com Sucesso !!!.
                                </div>
                            </div>
                            <?php
                        }
                        if ($mensagem == "erro") {
                            ?>
                            <div class="panel-body">
                                <div class="alert alert-danger">
                                    Infelizmente a operação não foi realizada !!!.
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>Codigo Série</th>
                                <th>Série</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("./Model/classeSerie.php");
                            //include ("../Model/conexao.php");
                            $listarSerie = new Serie();

                            $lista = $listarSerie->listaSeries();

                            //var_dump($lista);

                            if ($lista != false) {  //devolvendo se a linha for false
                                foreach ($lista as $linha) {
                                    ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $linha['codigo'] ?></td>
                                        <td><?php echo $linha['descricao'] ?></td>
                                        <td>
                                            <a href="index.php?pagina=formsCadastroSerie.php&cod_serie=<?php echo $linha['codigo'] ?>">
                                                <button type="button" class="btn btn-outline btn-default"
                                                        title="Alterar Registro">
                                                    Alterar
                                                </button>


                                                
                                        </td>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Some text in the modal.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.table-responsive -->
                        <!--<div class="well">
                            <h4>DataTables Usage Informationssssss</h4>
                            <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                            <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                        </div>-->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <?php
    }
?>        </div>
        <!-- /#page-wrapper -->
