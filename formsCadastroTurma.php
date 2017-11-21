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
                            isset($_GET["cod_turma"])
                        ){
                            echo "<H4>Alteração da Turma</H4>";
                            $cod_turma = $_GET["cod_turma"];
                        }else{
                            echo "<H4>Cadastro da Turma</H4>";
                            $cod_turma = NULL;
                        }
                        ?>
                    </div>
                    <div class="panel-body">
                        <form action="./Controller/cadastroTurma.php" role="form" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <?php
                                        include("./Model/classeTurma.php");
                                        $objeto = new Turma();//classe
                                        echo $cod_turma;
                                        $retornoTurma = $objeto->listaTurmaUm($cod_turma);//tras o vetor tipoCurso com os dados do
                                        foreach($retornoTurma as $valorTurma);
                                        ?>
                                        <input value="<?php if (isset($valorTurma["descricao"])) { echo $valorTurma["descricao"];} ?>" class="form-control" placeholder="Casdastre a Turma" name="descricao">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Relacione o Curso</label><br>
                                        <?php
                                            include("./Model/classeCurso.php");
                                            $objeto = new Curso();//classe
                                            $retornoCurso = $objeto->listaCursoSelect();//tras o vetor tipoCurso com os dados do curso retornados pela query e armazena na variavel(vetor) retornoCurso
                                        ?>
                                        <select class="form-control" name="cod_curso">
                                            <option></option>
                                            <?php
                                            foreach ($retornoCurso as $valorCurso) {//exibe na tela a cópia do retornoCurso em $valor
                                                ?>
                                                <option value="<?php echo $valorCurso["codigo"]; ?>"
                                                    <?php if(isset($valorTurma["cod_curso"]) == $valorCurso["codigo"]){ echo "selected"; }?>>
                                                    <?php if (isset($valorCurso["descricao"])) { echo $valorCurso["descricao"];} ?>
                                                </option>
                                            <?php } //foreach
                                            ?>
                                        </select>
                                    </div>
                                </div>
                           <!-- </div>

                            <div class="row">-->
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label>Ano</label>
                                        <input class="form-control" placeholder="Casdastre o ano da turma" name="ano" value="<?php if (isset($valorTurma["ano"])){ echo $valorTurma["ano"];}?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Relacione o Período</label><br>

                                        <select class="form-control" name="cod_periodo">
                                            <option></option>
                                            <?php
                                            include("./Model/classePeriodo.php");
                                            $objeto = new Periodo();//classe
                                            $retornoPeriodo = $objeto->listaPeriodo();//tras o vetor tipoCurso com os dados do curso retornados pela query e armazena na variavel(vetor) retornoCurso
                                            foreach ($retornoPeriodo as $valorPeriodo) {//exibe na tela a cópia do retornoCurso em $valor
                                                ?>
                                                <option value="<?php if (isset($valorPeriodo["codigo"])){ echo $valorPeriodo["codigo"]; }?>"<?php if(isset($valorTurma["cod_periodo"])==$valorPeriodo["codigo"]){ echo "selected"; }?>>
                                                    <?php echo $valorPeriodo["codigo"] .  ' ' . $valorPeriodo["descricao"]; ?>
                                                </option>
                                            <?php } //foreach
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            <!--</div>
                            <div class="row">-->
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Relacione a série</label><br>
                                        <select class="form-control" name="cod_serie">
                                            <?php
                                            include("./Model/classeSerie.php");
                                            $objeto = new Serie();//classe
                                            $retornoSerie = $objeto->listaSerie();//tras o vetor tipoCurso com os dados do curso retornados pela query e armazena na variavel(vetor) retornoCurso
                                            foreach ($retornoSerie as $valorSerie) {//exibe na tela a cópia do retornoCurso em $valor
                                                ?>
                                                <option value="<?php echo $valorSerie["codigo"] ?>" <?php if(isset($valorTurma["cod_serie"] )==$valorSerie["codigo"]){ echo "selected"; }?>>
                                                    <?php echo $valorSerie["descricao"] ?>
                                                </option>
                                            <?php } //foreach
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-10">

                                    <?php
                                    if (!isset($_GET["$cod_turma"])){
                                        ?>
                                        <input type="hidden" name="acao" value="cadastrar">
                                        <button type="submit" class="btn btn-default">GRAVAR</button>

                                        <?php
                                    }elseif (isset($_GET["$cod_turma"])){
                                        ?>
                                        <input type="hidden" name="acao" value="alterar">
                                        <input type="hidden" name="cod_turma" value="<?php echo $cod_turma; ?>">
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

                    <a href="index.php?pagina=formsCadastroTurma.php">
                        <button type="button" class="btn btn-primary">Adicionar Turma </button>
                    </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registro das Turmas Cadastradas
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
                                <th>Turma</th>
                                <th>Curso</th>
                                <th>Ano</th>
                                <th>Período</th>
                                <th>Série</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("./Model/classeTurma.php");
                            //include ("../Model/conexao.php");
                            $listarTurma = new Turma();

                            $lista = $listarTurma->listaTurmas();

                            //var_dump($lista);

                            if ($lista != false) {  //devolvendo se a linha for false
                                foreach ($lista as $linha) {
                                    ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $linha['codigo'] ?></td>
                                        <td><?php echo $linha['descricao'] ?></td>
                                        <td><?php echo $linha['cod_curso'] ?></td>
                                        <td><?php echo $linha['ano'] ?></td>
                                        <td><?php echo $linha['cod_periodo'] ?></td>
                                        <td><?php echo $linha['cod_serie'] ?></td>
                                        <td>
                                            <a href="index.php?pagina=formsCadastroTurma.php&cod_turma=<?php echo $linha['codigo'] ?>">
                                                <button type="button" class="btn btn-outline btn-default"
                                                        title="Alterar Registro">
                                                    Alterar
                                                </button>


                                                <a href="index.php?pagina=formsCadastroTurmaDisciplina.php&cod_turma_alterar=<?php echo $linha['codigo'] ?>">
                                                    <button type="button" class="btn btn-outline btn-default" title="Alterar Registro">
                                                        Disciplina
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
