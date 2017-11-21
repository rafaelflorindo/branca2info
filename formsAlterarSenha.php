        <div id="page-wrapper">
                <div class="row">
                    <form action="./Controller/cadastroUsuario.php" role="form" method="post">
                        <div class="col-lg-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <?php
                                    if(
                                    isset($_SESSION["cod_usuario"])
                                    ){
                                        echo "<H4>Alteração da senha do Usuário</H4>";
                                        echo $cod_usuario = $_SESSION["cod_usuario"];
                                        //exit;
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
                                    <div class="row">
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
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <?php
                                                        if (!isset($cod_usuario)){
                                                            ?>
                                                            <input type="hidden" name="acao" value="cadastrar">
                                                            <button type="submit" class="btn btn-default">GRAVAR</button>

                                                            <?php
                                                        }elseif (isset($cod_usuario)){
                                                            ?>
                                                            <input type="hidden" name="acao" value="alterarSenha">
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
                    </form>
                    <!-- /.panel-body -->
                </div>
                      </div>
        <!-- /#page-wrapper -->
