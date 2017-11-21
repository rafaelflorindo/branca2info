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
                            isset($_GET["cod_disciplina"])
                        ){
                            echo "<H4>Alteração da Disciplina</H4>";
                            $cod_disciplina = $_GET["cod_disciplina"];
                        }else{
                            echo "<H4>Cadastro da Disciplina</H4>";
                            $cod_disciplina = NULL;
                        }
                        //exit;

                        ?>
                    </div>
                    <div class="panel-body">
                        <form action="./Controller/cadastroDisciplina.php" role="form" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label>Disciplina</label>
                                        <?php
                                        include("./Model/classeDisciplina.php");
                                        $objeto = new Disciplina();//classe
                                        echo $cod_disciplina;
                                        $retornoDisciplina = $objeto->listaDisciplinaUm($cod_disciplina);//tras o vetor tipoCurso com os dados do
                                        foreach($retornoDisciplina as $valorDisciplina);
                                        ?>
                                        <input value="<?php if (isset($valorDisciplina["descricao"])) { echo $valorDisciplina["descricao"];} ?>" class="form-control" placeholder="Casdastre a Disciplina" name="descricao">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label>Carga Horária</label>
                                        <?php
                                   /* include("./Model/classeDisciplina.php");
                                        $objeto = new Disciplina();//classe
                                        echo $cod_disciplina;
                                        $retornoDisciplina = $objeto->listaDisciplinaUm($cod_Disciplina);//tras o vetor tipoCurso com os dados do
                                    foreach($retornoDisciplina as $valorDisciplina);*/
                                        ?>
                                    <input value="<?php if (isset($valorDisciplina["carga_horaria"])) { echo $valorDisciplina["carga_horaria"];} ?>" class="form-control" placeholder="Casdastre a Disciplina" name="carga_horaria">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            <div class="row">
                                <div class="col-lg-10">        
                                    <div class="form-group">
                                        <label>Status da Disciplina</label>
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="status" id="optionsRadios1" value="1" checked>Ativo
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                <input type="radio" name="status" id="optionsRadios2" value="0">Inativo
                                                    </label>
                                            </div>
                                            </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-lg-10">

                                    <?php
                                    if (!isset($cod_disciplina)){
                                        ?>
                                        <input type="hidden" name="acao" value="cadastrar">
                                        <button type="submit" class="btn btn-default">GRAVAR</button>

                                        <?php
                                    }elseif (isset($cod_disciplina)){
                                        ?>
                                        <input type="hidden" name="acao" value="alterar">
                                        <input type="hidden" name="cod_disciplina" value="<?php echo $cod_disciplina; ?>">
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

                    <a href="index.php?pagina=formsCadastroDisciplina.php">
                        <button type="button" class="btn btn-primary">Adicionar Disciplina </button>
                    </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registro das Disciplinas Cadastradas
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
                                <th>Codigo Disciplina</th>
                                <th>Disciplina</th>
                                <th>Carga Horária</th>
                                <th>Status</th>
                                 <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("./Model/classeDisciplina.php");
                            //include ("../Model/conexao.php");
                            $listarDisciplina = new Disciplina();

                            $lista = $listarDisciplina->listaDisciplinas();

                            //var_dump($lista);

                            if ($lista != false) {  //devolvendo se a linha for false
                                foreach ($lista as $linha) {
                                    ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $linha['codigo'] ?></td>
                                        <td><?php echo $linha['descricao'] ?></td>
                                        <td><?php echo $linha['carga_horaria'] ?></td>
                                        <td><?php echo $linha['status'] ?></td>
                                        <td>
                                            <a href="index.php?pagina=formsCadastroDisciplina.php&cod_disciplina=<?php echo $linha['codigo'] ?>">
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
