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
                                    isset($_GET["cod_usuario"])
                                    ){
                                        echo "<H4>Alteração do Usuário</H4>";
                                        $cod_usuario = $_GET["cod_usuario"];
                                        include("./Model/classeUsuario.php");
                                        $objeto = new Usuario();//classe
                                        // echo $cod_usuario;

                                        $retornoUsuario = $objeto->listaUsuarioUm($cod_usuario);//tras o vetor tipoCurso com os dados do
                                        foreach($retornoUsuario as $valorUsuario);
                                    }else{
                                        echo "<H4>Cadastro de usuário</H4>";
                                        $cod_usuario = NULL;
                                    }
                                    //exit;

                                    ?>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label>Codigo</label>
                                                <input class="form-control" placeholder="Casdastre o nome do usuário"
                                                       name="nome" value="<?php if (isset($valorUsuario["codigo"])) echo $valorUsuario["codigo"]; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-5">
                                                <div class="form-group">
                                                <label>Nome</label>
                                                <input class="form-control" placeholder="Casdastre o nome do usuário"
                                                       name="nome" value="<?php if (isset($valorUsuario["nome"])) echo $valorUsuario["nome"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if(!isset($cod_usuario)){
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label>Login</label>
                                                <input class="form-control" placeholder="Cadastre o login do usuário"
                                                       name="login"
                                                       value="<?php if (isset($valorUsuario["login"])) echo $valorUsuario["login"]; ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label>Senha</label>
                                                <input class="form-control" placeholder="Cadastre a senha do usuário"
                                                       name="senha">
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label>Redigite sua senha: </label><input class="form-control"
                                                                                          placeholder="Digite novamente a senha do usuário"
                                                                                          name="senhaDuplicada"
                                                                                          type="password" value="">
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label>Tipos de Usuários</label>
                                                <select class="form-control" name="tipoUsuario[]" multiple>
                                                    <?php
                                                    include("./model/classeTipoUsuario.php");
                                                    $objeto = new tipoUsuario();
                                                    $retornoTipo = $objeto->listaTipoUsuario();
                                                    foreach ($retornoTipo as $valor) {
                                                        ?>
                                                        <option value="<?php echo $valor["codigo"] ?>">
                                                            <?php echo $valor["codigo"];
                                                            echo $valor["descricao"] ?>
                                                        </option>
                                                        <?php
                                                    } //foreach
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label>Status do Usuário</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="status" id="optionsRadios1" value="1"
                                                               checked>Ativo
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="status" id="optionsRadios2" value="0">Inativo
                                                    </label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-10">

                                                        <?php
                                                        if (!isset($cod_usuario)){
                                                            ?>
                                                            <input type="hidden" name="acao" value="cadastrar">
                                                            <button type="submit" class="btn btn-default">GRAVAR</button>

                                                            <?php
                                                        }elseif (isset($cod_usuario)){
                                                            ?>
                                                            <input type="hidden" name="acao" value="alterar">
                                                            <input type="hidden" name="cod_usuario" value="<?php echo $cod_usuario; ?>">
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

                            <a href="index.php?pagina=formsCadastroUsuario.php">
                                <button type="button" class="btn btn-primary">Adicionar Usuario </button>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Registro das Usuarios Cadastradas
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
                                        <th>Nome</th>
                                        <th>Login</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include("./Model/classeUsuario.php");
                                    //include ("../Model/conexao.php");
                                    $listarUsuario = new Usuario();

                                    $lista = $listarUsuario->listaUsuarioGeral();

                                    //var_dump($lista);

                                    if ($lista != false) {  //devolvendo se a linha for false
                                        foreach ($lista as $linha) {
                                            ?>

                                            <tr class="odd gradeX">
                                                <td><?php echo $linha['codigo'] ?></td>
                                                <td><?php echo $linha['nome'] ?></td>
                                                <td><?php echo $linha['login'] ?></td>
                                                <td>
                                                    <a href="index.php?pagina=formsCadastroUsuario.php&cod_usuario=<?php echo $linha['codigo'] ?>">
                                                        <button type="button" class="btn btn-outline btn-default"
                                                                title="Alterar Registro">
                                                            Alterar
                                                        </button>
                                                    </a>
                                                   <!-- <a href="index.php?pagina=formsCadastroUsuario.php&cod_usuario=<?php echo $linha['codigo'] ?>">
                                                        <button type="button" class="btn btn-outline btn-default"
                                                                title="Excluir Registro">
                                                            Excluir
                                                        </button>-->
                                                    </a>

                                                        <a href="index.php?pagina=formsPermissao.php&acao=listar&cod_usuario=<?php echo $linha['codigo'] ?>">
                                                            <button type="button" class="btn btn-outline btn-default" title="Alterar Registro">
                                                                Alterar Permissões
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
