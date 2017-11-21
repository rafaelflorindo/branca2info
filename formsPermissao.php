        <div id="page-wrapper">
            <?php
            if(!isset($_GET["acao"])=="listar") {

                ?>
                <div class="row">
                    <form action="./Controller/cadastroUsuario.php" role="form" method="post">
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php
                                    if(
                                    isset($_GET["cod_usuario"]) && isset($_GET["cod_tipo_usuario"])
                                    ){
                                        echo "<H4>Alteração das Permissões</H4>";
                                        $cod_usuario = $_GET["cod_usuario"];

                                        $cod_tipo_usuario = $_GET["cod_tipo_usuario"];
                                        include("./Model/classePermissao.php");
                                        $objeto = new Permissao();//classe
                                        // echo $cod_usuario;

                                        $retornoUsuario = $objeto->listaPermissaoUmAlterar($cod_usuario, $cod_tipo_usuario);//tras o vetor tipoCurso com os dados do

                                        foreach($retornoUsuario as $valorUsuario);
/*
echo "<pre>";
                                        var_dump($retornoUsuario);
             echo "</pre>";*/
                                    }elseif(isset($_GET["cod_usuario"]) && !isset($_GET["cod_tipo_usuario"]))
                                    {
                                        echo "<H4>Cadastro de Permissões ao usuário</H4>";
                                        $cod_usuario = $_GET["cod_usuario"];
                                    }
                                    //exit;

                                    ?>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label>Codigo do Usuário</label>
                                                <input class="form-control" placeholder="Casdastre o nome do usuário"
                                                       name="nome" value="<?php if (isset($valorUsuario["cod_usuario"])) echo $valorUsuario["cod_usuario"]; elseif($cod_usuario) echo $cod_usuario;  ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label>Tipos de Usuários</label>
                                                <?php
                                                    include("./model/classeTipoUsuario.php");
                                                    $objeto = new tipoUsuario();
                                                    $retornoTipo = $objeto->listaTipoUsuario();
                                                   // var_dump($retornoUsuario);
                                                if(isset($valorUsuario["cod_tipo_usuario"])) {
                                                    $cod_tipo_usuario = $valorUsuario["cod_tipo_usuario"];
                                                }
                                                ?>
                                                    <select class="form-control" name="tipoUsuario">
                                                        <?php
                                                            foreach ($retornoTipo as $valor_tipo) {
                                                        ?>
                                                        <option value="<?php echo $valor_tipo["codigo"]; ?>" <?php if ($valor_tipo["codigo"] ==
                                                           isset($cod_tipo_usuario)) echo "selected"?>>

                                                            <?php if (isset($valor_tipo["descricao"])) echo "$valor_tipo[codigo] - $valor_tipo[descricao]";
                                                            ?>
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
                                                        if (!isset($_GET["cod_tipo_usuario"])){
                                                            ?>
                                                            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario; ?>">
                                                            <input type="hidden" name="acao" value="cadastrarPermissao">
                                                            <button type="submit" class="btn btn-default">GRAVAR</button>

                                                            <?php
                                                        }elseif (isset($cod_usuario) && isset($_GET["cod_tipo_usuario"])){
                                                            ?>
                                                            <input type="hidden" name="acao" value="alterarPermissao">
                                                            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario; ?>">
                                                            <input type="hidden" name="cod_tipo_usuario" value="<?php echo $cod_tipo_usuario; ?>">
                                                            <button type="submit" class="btn btn-default">ALTERAR</button>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /.panel-body -->
                </div>
                <?php

    }elseif(isset($_GET["acao"])=="listar") {
                ?>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel-body">

                            <a href="index.php?pagina=formsPermissao.php&cod_usuario=<?php echo $_GET["cod_usuario"] ?>">
                                <button type="button" class="btn btn-primary">Adicionar Permissao ao Usuario </button>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Registro das permissões do Usuarios Cadastradas
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
                                        <th>Codigo Usuario</th>
                                        <th>Tipo Usuário</th>
                                        <th>Descrição</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include("./Model/classePermissao.php");
                                    //include ("../Model/conexao.php");
                                    $listarPermissao = new Permissao();
                                    if(
                                    isset($_GET["cod_usuario"])
                                    ) {
                                        $cod_usuario = $_GET["cod_usuario"];
                                    }
                                    $lista = $listarPermissao->listaPermissaoUm($cod_usuario);

                                    //var_dump($lista);

                                    if ($lista != false) {  //devolvendo se a linha for false
                                        foreach ($lista as $linha) {
                                            ?>

                                            <tr class="odd gradeX">
                                                <td><?php echo $linha['cod_usuario'] ?></td>
                                                <td><?php echo $linha['cod_tipo_usuario'] ?></td>
                                                <td><?php echo $linha['descricao'] ?></td>
                                                <td>
                                                    <a href="index.php?pagina=formsPermissao.php&cod_usuario=<?php echo $linha['cod_usuario'] ?>&cod_tipo_usuario=<?php echo $linha['cod_tipo_usuario'] ?>">
                                                        <button type="button" class="btn btn-outline btn-default"
                                                                title="Alterar Registro">
                                                            Alterar
                                                        </button>
                                                    </a>
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
