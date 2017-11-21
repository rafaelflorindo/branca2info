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
                            isset($_GET["cod_curso"])
                        ){
                            echo "<H4>Alteração do Curso</H4>";
                            $cod_curso = $_GET["cod_curso"];
                        }else{
                            echo "<H4>Cadastro do Curso</H4>";
                            $cod_curso = NULL;
                        }
                        ?>
                    </div>
                    <div class="panel-body">
                        <form action="./Controller/cadastroCurso.php" role="form" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <?php
                                        include("./Model/classeCurso.php");
                                        $objeto = new Curso();//classe
                                        echo $cod_curso;
                                        $retornoCurso = $objeto->listaCursoUm($cod_curso);//tras o vetor tipoCurso com os dados do
                                        foreach($retornoCurso as $valorCurso);
                                        ?>
                                        <input value="<?php if (isset($valorCurso["descricao"])) { echo $valorCurso["descricao"];} ?>" class="form-control" placeholder="Casdastre o Curso" name="descricao">

                                    </div>
                                </div>
                            </div>
                               <div class="row">
                                   <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Carga Horária</label>
                                                                <input class="form-control" name="carga_horaria" placeholder="Casdastre a carga horária do curso" value="<?php if (isset($valorCurso["carga_horaria"])) echo $valorCurso["carga_horaria"]; ?>">
                                       </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Relacione o Coordenador</label><br>
                                            <select name="cod_usuario_coordenador"> 
                                            <?php
                                            include("./Model/classeUsuario.php");
                                            $objeto = new Usuario();
                                            $retornoCoordenador = $objeto->listaUsuarioCoordenador();
                                            foreach($retornoCoordenador as $valorCoordenador){
                                            ?>
                                            <option value="<?php echo $valor["codigo"] ?>" 

                                                <?php
                                                    if (isset($valorCurso["codigo"])==isset($valorCoordenador["cod_usuario"])){
                                                        echo "selected";
                                                    }
                                                ?>
                                                >
                                                <?php echo $valorCoordenador["cod_usuario"] . "-". $valorCoordenador["nome_usuario"]; ?>
                                            </option>
                                            <?php
                                            } //foreach
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-lg-10">

                                    <?php
                                    if (!isset($_GET["cod_curso"])){
                                        ?>
                                        <input type="hidden" name="acao" value="cadastrar">
                                        <button type="submit" class="btn btn-default">GRAVAR</button>

                                        <?php
                                    }elseif (isset($_GET["cod_curso"])){
                                        $cod_curso = $_GET["cod_curso"];
                                        ?>
                                        <input type="hidden" name="acao" value="alterar">
                                        <input type="hidden" name="cod_curso" value="<?php echo $cod_curso; ?>">
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

                    <a href="index.php?pagina=formsCadastroCurso.php">
                        <button type="button" class="btn btn-primary">Adicionar Curso </button>
                    </a>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registro das Cursos Cadastrados
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
                                <th>Codigo Curso</th>
                                <th>Curso</th>
                                <th>Carga Horária</th>
                                <th>Coordenador</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include("./Model/classeCurso.php");
                            //include ("../Model/conexao.php");
                            $listarCurso = new Curso();

                            $lista = $listarCurso->listaCursos();

                            //var_dump($lista);

                            if ($lista != false) {  //devolvendo se a linha for false
                                foreach ($lista as $linha) {
                                    ?>

                                    <tr class="odd gradeX">
                                        <td><?php echo $linha['codigo'] ?></td>
                                        <td><?php echo $linha['descricao'] ?></td>
                                        <td><?php echo $linha['carga_horaria'] ?></td>
                                        <td><?php echo $linha['cod_usuario_coordenador'] ?></td>
                                        <td>
                                            <a href="index.php?pagina=formsCadastroCurso.php&cod_curso=<?php echo $linha['codigo'] ?>">
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