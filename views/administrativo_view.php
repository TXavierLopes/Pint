<!DOCTYPE html>
<html>
<head>
    <title>Boleias</title>
</head>
<body>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Boleias Disponiveis</h3>
                    </div>
                    <!-- /.box-header -->

                    <table id="table" class="table table-striped table-hover table-responsive" >

                        <tr>
                            <th>#</th>
                            <th>Veiculo</th>
                            <th>Funcionario</th>
                            <th>Origem</th>
                            <th>Destino</th>
                            <th>Data e Hora de partida</th>
                            <th>Data e Hora de chegada</th>
                            <th>Material:</th>
                            <th>Estado:</th>
                            <th colspan="2" style="text-align:center">Adicionar Economato</th>
                        </tr>
                        <tbody>
                        <?php foreach($boleias as $boleia) { ?>
                            <tr>
                                <td><?php echo $boleia->id_boleia;?></td>
                                <td><?php echo $boleia->matricula;?></td>
                                <td><?php echo $boleia->name;?></td>
                                <td><?php echo $boleia->origem;?></td>
                                <td><?php echo $boleia->destino;?></td>
                                <td><?php echo $boleia->hora_inicio;?></td>
                                <td><?php echo $boleia->hora_fim;?></td>
                                <td><?php echo $boleia->material;?></td>
                                <td><?php echo $boleia->estado;?></td>
                                <td><button class="btn btn-success" data-toggle="modal"  data-id="<?= $boleia->id_boleia; ?>" data-material="<?= $boleia->material?>" data-target="#exampleModal"  style="float: right;"><i class="glyphicon glyphicon-plus"></i> Economato</button></td>
                            </tr>
                        <?php } ?>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- MODAL PARA BOTAO ADICIONAR-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Adicionar Economato</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="inserir_economato/" method="POST">

                                    <input type="hidden" id="id_boleia" class="form-control" name="id_boleia">
                                    <div class="form-group">

                                        <label class="col-form-label">Material:</label>
                                        <input type="text" id="material" class="form-control" name="material">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado" class="col-form-label"> Estado:</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="estado" name="estado" value="1"/>
                                        <label for="estado">Entregue</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="estado" name="estado" value="0" checked/>
                                        <label for="estado">Não entregue</label>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                        <button type="submit" name="submit" class="btn btn-success">Gravar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>