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
                            isset($_GET["cod_periodo"])
                        ){
                            echo "<H4>Alteração do Período</H4>";
                            $cod_periodo = $_GET["cod_periodo"];
                        }else{
                            echo "<H4>Cadastro do Período</H4>";
                            $cod_periodo = NULL;

                        }
                        //exit;

                        ?>
                    </div>
                    <div id="page-wrapper">
                        <div class="row">
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                                Cadastro Período
                                    </div>
                                    <div class="panel-body">             
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <form action=  "./Controller/cadastroPeriodo.php" method="post">
                                                    <div class="form-group">
                                                        <label>Período</label>
                                                        <input class="form-control" placeholder="Casdastre o Período" name="descricao">
                                                    </div> 
                                            </div>
                                        </div>                                     
                                        <div class="row">
                                        <div class="col-lg-10">

                                            <?php
                                            if (!isset($_GET["$cod_periodo"])){
                                                ?>
                                                <input type="hidden" name="acao" value="cadastrar">
                                                <button type="submit" class="btn btn-default">GRAVAR</button>
                                                <input type="button" value="Voltar" onClick="history.go(-1)">
                                                                             <!-- VOLTA A PÁGINA ANTERIOR -->


                                                <?php
                                                }elseif (isset($_GET["$cod_periodo"])){
                                                ?>
                                                <input type="hidden" name="acao" value="alterar">
                                                <input type="hidden" name="cod_periodo" value="<?php echo $cod_periodo; ?>">
                                                <button type="submit" class="btn btn-default">ALTERAR</button>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                    </div>                <!-- /.panel-body -->
                                </div>
                                    <!-- /.panel -->
                            </div>
                                            <!-- /.col-lg-12 -->
                        </div>
                                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }elseif(isset($_GET["acao"])=="listar") {
        ?>

        <div class="row">
            <div class="col-lg-10">
                <div class="panel-body">

                    <a href="index.php?pagina=formsCadastroPeriodo.php">
                        <button type="button" class="btn btn-primary">Adicionar Período</button>
                    </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registro dos Períodos
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
                                <th>Codigo Período</th>
                                <th>Período</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("./Model/classePeriodo.php");
                            //include ("../Model/conexao.php");
                            $listaPeriodo = new Periodo();

                            $lista = $listaPeriodo->listaPeriodo();

                            //var_dump($lista);

                            if ($lista != false) {  //devolvendo se a linha for false
                                foreach ($lista as $linha) {
                                    ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $linha['codigo'] ?></td>
                                        <td><?php echo $linha['descricao'] ?></td>
                                        <td>
                                            <a href="index.php?pagina=formsCadastroPeriodo.php&cod_periodo=<?php echo $linha['codigo'] ?>">
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
                        <!-- /#page-wrapper -->

                    <script src="./vendor/jquery/jquery.min.js"></script>

                    <!-- Bootstrap Core JavaScript -->
                    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

                    <!-- Metis Menu Plugin JavaScript -->
                    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

                    <!-- Custom Theme JavaScript -->
                    <script src="./dist/js/sb-admin-2.js"></script>