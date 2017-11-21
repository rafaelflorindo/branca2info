        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cadastro Tipo do Usuário
                        </div>
                        <div class="panel-body"> <!-- tabela com espaço a esquerda -->
                                <div class="col-lg-5">
                                    <form action=  "./Controller/cadastroTipoUsuario.php" method="post">
                                        <div class="form-group">
                                            <label>Tipo do Usuário</label>
                                            <input class="form-control" placeholder="Casdastre o tipo usuário" name="descricao">
                                        </div>                                 
                                        <div class="row">
                                            <div class="col-lg-10">        
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-default">GRAVAR</button>
                                                    <button type="reset" class="btn btn-default">LIMPAR</button>
                                                    <input type="button" value="Voltar" onClick="history.go(-1)">
                                                    <!--volta uma página-->
                                                    <!--<button type="reset" class="btn btn-default">ALTERAR</button>-->
                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>
