<?php
   // session_start();
if(isset($_GET["cod_turma_alterar"])){
    $_SESSION["cod_turma"] =  $_GET["cod_turma_alterar"];
}
    if(isset($_SESSION["cod_turma"]) || (isset($_POST["cod_turma_disciplina"]) && isset($_POST["cod_turma"]) &&
                        isset($_POST["cod_disciplina"]) &&
                        isset($_POST["cod_usuario_professor"]))){
       echo $cod_turma = $_SESSION["cod_turma"];
    ?>
                                                
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                       if(
                        isset($_GET["cod_turma"]) && 
                        isset($_GET["cod_disciplina"]) &&
                        isset($_GET["cod_usuario_professor"])
                        ){
                        echo "<H4>Alteração da Turma Disciplina</H4>";
                        echo " Cod Turma = " . $cod_turma = $_GET["cod_turma"];
                        echo " Cod Turma Disciplina= " . $cod_turma_disciplina = $_GET["cod_turma_disciplina"];
                        echo " Cod Disciplina = " . $cod_disciplina = $_GET["cod_disciplina"];
                        echo " Cod Usuario Professor = " . $cod_usuario_professor = $_GET["cod_usuario_professor"];
                    }else{
                           echo "<H4>Cadastro da Turma Disciplina</H4>";
                           //$cod_turma = NULL;
                           $cod_turma_disciplina = NULL;
                           $cod_disciplina = NULL;
                           $cod_usuario_professor = NULL;
                    }
                    ?>
                </div>
                    <div class="panel-body">             
                        <div class="row">
                            <div class="col-lg-10">
                                <form action="./Controller/cadastroTurmaDisciplina.php" method="POST">  
                                <div class="row"> 
                                    <div class="col-lg-5"> 
                                        <div class="form-group">
                                                <label>Escolha uma disciplina</label><br>
                                                 <?php
                                                include("./Model/classeDisciplina.php");
                                                $objeto = new Disciplina();//classe
                                                $retornoDisciplina = $objeto->listaDisciplinaSelect();
                                          //$retornoDisciplina = $objeto->listaDisciplina($cod_disciplina);
    //tras o vetor tipoDisciplina com os dados daa disciplina retornados pela query e armazena na variavel(vetor) retornoCurso?>
                                                <select class="form-control" name="cod_disciplina">
                                                <option></option>
                                               <?php
                                                foreach($retornoDisciplina as $valor){
    //exibe na tela a cópia do retornoDisciplina em $valor
                                                ?>
                                                <option  value="<?php echo $valor["codigo"] ?>"<?php if ($valor["codigo"] == $cod_disciplina) echo "selected"; ?>>
                                                                                <?php echo $valor["codigo"] . '    ' . $valor["descricao"]?>
                                           </option>
                                            <?php
                                               } //foreach
                                            ?>
                                        </select>
                                </div>
                            </div>
                        </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Relacione o Professor</label><br>
                                            <select name="cod_usuario_professor"> 
                                            <?php
                                            include("./Model/classeUsuario.php");
                                            $objeto = new Usuario();
                                            $retornoProfessor = $objeto->listaUsuarioProfessor();
                                            foreach($retornoProfessor as $valorProfessor){
                                            ?>
                                            <option value="<?php echo $valor["codigo"] ?>" 

                                                <?php
                                                    if (isset($valorDisciplina["codigo"])==isset($valorProfessor["cod_usuario"])){
                                                        echo "selected";
                                                    }
                                                ?>
                                                >
                                                <?php echo $valorProfessor["cod_usuario"] . "-". $valorProfessor["nome"]; ?>
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
                                <input type="hidden" name="cod_turma" value="<?php echo $cod_turma; ?>">
                                                        <?php
                                                    }
                                                ?>
                                <?php
                                    if (isset($cod_turma) && !isset($cod_disciplina) && !isset($cod_usuario_professor)){
                                ?>
                                        <input type="hidden" name="acao" value="cadastrar">
                                        <button type="submit" class="btn btn-default">GRAVAR</button>
                            </div>
                        </div>
                    </div>
                                        <?php
                                    }elseif (isset($cod_turma_disciplina)){
                                ?>
                                        <input type="hidden" name="acao" value="alterar">
                                        <input type="hidden" name="cod_turma_disciplina" value="<?php echo $cod_turma_disciplina; ?>">
                                        <button type="submit" class="btn btn-default">ALTERAR</button>
                                    <?php
                                }
                                ?>
                            
                        
                    </form>
                 </div>    
            </div> 
        </div>
    </div>
                <!-- /.col-lg-12 -->
    <!-- /.row CORRIGIR DAQUI PARA BAIXO-->
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Registro das Disciplinas Cadastradas
                    </div>
                    <!-- /.panel-heading -->

                    <?php
                    if(isset($_GET["mensagem"])){
                        $mensagem = $_GET["mensagem"];

                        if ($mensagem == "sucesso"){
                        ?>
                        <div class="panel-body">
                            <div class="alert alert-success">
                                Operação realizada com Sucesso !!! <a href="#" class="alert-link">Alert Link</a>.
                            </div>
                        </div>
                        <?php
                        }if ($mensagem == "erro"){
                            ?>
                            <div class="panel-body">
                                <div class="alert alert-danger">
                                    Infelizmente a operação não foi realizada !!! <a href="#" class="alert-link">Alert Link</a>.
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Codigo Turma</th>
                                <th>Codigo Diciplina</th>
                                <th>Codigo Professor</th>
        
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include ("./Model/classeTurmaDisciplina.php");
                            //include ("../Model/conexao.php");
                            $listaDisciplina = new TurmaDisciplina();
                           
                            $lista = $listaDisciplina->listaturma_Disciplina();

                            //var_dump($lista);

if ($lista != false) {  //devolvendo se a linha for false
                            foreach($lista as $linha){
                                ?>

                                <tr class="odd gradeX">
                                    <td><?php echo $linha['cod_turma_disciplina'] ?></td>
                                    <td><?php echo $linha['cod_turma'] ?></td>
                                    <td><?php echo $linha['cod_disciplina'] ?></td>
                                    <td><?php echo $linha['cod_usuario_professor'] ?></td> 
                                    <td><a href="index.php?pagina=formsCadastroTurmaDisciplina.php&cod_turma_disciplina=<?php echo $linha['cod_turma_disciplina'] ?>&cod_turma=<?php echo $linha['cod_turma'] ?>&cod_disciplina=<?php echo $linha['cod_disciplina'] ?>&cod_usuario_professor=<?php echo $linha['cod_usuario_professor'] ?>">
                                            <button type="button" class="btn btn-outline btn-default" title="Alterar Registro">
                                                Alterar
                                            </button>

                                    </td>
                                </tr>
                            <?php } } ?>
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
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
</div>
    <!-- /#wrapper -->
