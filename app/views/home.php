<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center"  id="linha-user">
        <div class="col-xl-6 col-lg-10 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5 tela" >
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-12">
                            <div class="p-5">
                                <br><br>
                                <div class="text-center"></div>
                                <form class="user" action="situacaoAutomovel.php" method="POST" onsubmit="return validacao();">
                                    <input type="text" id="search" name="txtPesq" class="form-control mb-4" placeholder="Número da Chapa de Matrícula">
                                    <button id="teste" class="btn btn-info btn-block my-4" type="submit">Validar</button>
                                    <input type="hidden" name="action" value="pesquisar" class="btn btn-success">
                                    <span id="erro" class="info text-center">dffd</span>
                                    <hr>
                                    <br><br><br><br><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>