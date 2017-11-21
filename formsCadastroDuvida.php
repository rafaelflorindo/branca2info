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
                            isset($_GET["cod_duvida"])
                        ){
                            echo "<H4>Alteração da Duvida</H4>";
                            $cod_duvida = $_GET["cod_duvida"];
                        }else{
                            echo "<H4>Cadastro da Duvida</H4>";
                            $cod_duvida = NULL;

                        }
                        //exit;
                        ?>
                    </div>
                    <div class="panel-body">
                        <form action="./Controller/cadastroDuvida.php" role="form" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label>Entre com a sua dúvida:</label>
                                            <div class="form-group">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                        <?php
                                        include("./Model/classeDuvida.php");
                                        $objeto = new Duvida();//classe
                                        echo $cod_duvida;
                                        $retornoDuvida = $objeto->listaDuvidaUm($cod_duvida);//tras o vetor tipoCurso com os dados do
                                        foreach($retornoDuvida as $valorDuvida);
                                        ?>
                                        <!--<input value="<?php if (isset($valorDuvida["pergunta"])) { echo $valorDuvida["pergunta"];} ?>" class="form-control" placeholder="Casdastre a Duvida" name="pergunta">-->

                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div id="page-wrapper">
                        <div class="row">
                <!--<div style="background-color: #9900FF;">The quick brown fox jumps over the lazy dog.</div>-->

                                    <div class="panel-body">             
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <form action=  "./Controller/cadastroDuvida.php" method="post">
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-lg-10">        
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-default">ENVIAR</button>
                                                    <button type="reset" class="btn btn-default">LIMPAR</button>
                    </form>
                                                </div>
                                            </div>
                                                        <!-- /.row (nested) -->
                                        </div>
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

                    <a href="index.php?pagina=formsCadastroDuvida.php">
                        <button type="button" class="btn btn-primary">Adicionar Duvida </button>
                    </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registro das Duvidas Cadastradas
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
                                <th>Codigo Turma</th>
                                <th>Disciplina</th>
                                <th>Professor</th>
                                <th>pergunta</th>
                                <th>Resposta</th>
                                <th>Assunto</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("./Model/classeDuvida.php");
                            //include ("../Model/conexao.php");
                            $listarDuvida = new Duvida();

                            $lista = $listarDuvida->listaDuvidas();

                            //var_dump($lista);

                            if ($lista != false) {  //devolvendo se a linha for false
                                foreach ($lista as $linha) {
                                    ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $linha['cod_turma'] ?></td>
                                        <td><?php echo $linha['cod_disciplina'] ?></td>
                                        <td><?php echo $linha['cod_usuario_professor'] ?></td>
                                        <td><?php echo $linha['pergunta'] ?></td>
                                        <td><?php echo $linha['resposta'] ?></td>
                                        <td><?php echo $linha['assunto'] ?></td>
                                        <td>
                                            <a href="index.php?pagina=formsCadastroDuvida.php&cod_duvida=<?php echo $linha['codigo'] ?>">
                                                <button type="button" class="btn btn-outline btn-default"
                                                        title="Alterar Registro">
                                                    Alterar
                                                </button>


                                                <a href="index.php?pagina=formsCadastroDuvida.php&cod_duvida_alterar=<?php echo $linha['codigo'] ?>">
                                                    <button type="button" class="btn btn-outline btn-default" title="Alterar Registro">
                                                        Duvida
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
?>
</div>
        <!-- /#page-wrapper -->
                        <!-- /#page-wrapper -->

                    <script src="./vendor/jquery/jquery.min.js"></script>

                    <!-- Bootstrap Core JavaScript -->
                    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

                    <!-- Metis Menu Plugin JavaScript -->
                    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

                    <!-- Custom Theme JavaScript -->
                    <script src="./dist/js/sb-admin-2.js"></script>