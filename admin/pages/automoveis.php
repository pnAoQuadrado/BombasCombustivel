
<?php
    include '../../model/daoStandard.php';
    include '../../model/daoAutomovel.php';

    $ob = new daoStandard();
    $proprietarios = $ob->getProprietarios();

    $ob=new daoAutomovel();
    $registos=$ob->getRegistos();

    extract($_REQUEST);
    $automovel=$matricula=$clBotao=$txBotao="";
    if (isset($action)){
        //$action = $action;
        if($action == 'alterar'){
            $clBotao = 'btn btn-primary';
            $txBotao = 'Salvar';
        }
        else if($action == 'eliminar'){
            $clBotao = 'btn btn-danger';
            $txBotao = 'Eliminar';
        }
        $automovel = $ob->getAuto($idauto);
        $matricula= $automovel[0]['num_matricula'];
    }
    else{
        $action = 'adicionar';
        $clBotao = 'btn btn-success';
        $txBotao = 'Salvar';
    } 
?>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Automóveis</h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Formulário</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="../../controller/ccAuto.php">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nº Matrícula</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="cMatricula" value ="<?php echo $matricula ?>" class="form-control col-md-7 col-xs-12" name="txtMatr">
                                </div>
                                <div class="form-group erro"></div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Proprietário</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="cProp" name="cmbProp">
                                        <option>Escolha o proprietário</option>
                                            <?php foreach ($proprietarios as $p) { ?>
                                                <option value="<?php echo $p['idproprietario'] ?>"
                                                <?php if(is_array($automovel)) if($p['idproprietario'] == $automovel[0]['idproprietario']){ ?> selected <?php } ?>><?php echo $p['nome'] ?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group erro"></div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="reset">Novo</button>
                                    <button class="btn btn-primary" type="reset">Cancelar</button>
                                    <input type="submit" value="<?php echo $txBotao ?>" class="<?php echo $clBotao ?>" onclick="return validacao();">
                                    <input type="hidden" name="accion" value="<?php echo $action ?>" class="btn btn-success">
                                    <input type="hidden" name="id" value="<?php if(is_array($automovel)){echo $automovel[0]['idautomovel'];}?>" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Dados</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Número de Matrícula
                                </th>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Acções
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                        $i=0;
                        foreach ($registos as $linha){ ?>
                            <tr>
                                <td><?php echo ++$i; ?> </td>
                                <td><?php echo $linha['idautomovel']?> </td>
                                <td><?php echo $linha['num_matricula']?> </td>
                                <td><?php echo $linha['nome']?> </td>
                                <td><a id="editar" href="?opcion=3&action=alterar&idauto=<?php echo $linha['idautomovel'];?>">Editar</a>  | <a id="eliminar" href="?opcion=3&action=eliminar&idauto=<?php echo $linha['idautomovel'];?>">Eliminar</td>
                            </tr>
                <?php  } ?>
                </tbody>
            </table> 
                </div>
         
</div>