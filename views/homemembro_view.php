<!-- Section: intro -->
<section id="intro" class="intro">
    <div class="intro-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                        <h2 class="h-ultra">Boleias Disponíveis</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                        <h4 class="h-light">Crie Boleia após  <span class="color">verificar</span> que cumpre os seguintes requisitos </h4>
                    </div>
                    <div class="well well-trans">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">

                            <ul class="lead-list">
                                <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Inscrição anulada</strong><br />Inscrever-se porem não ter lugar disponivel</span></li>
                                <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Verificar</strong><br />Verificar se não tem lugar dísponivel</span></li>
                                <li><a href="boleiasmembro">  <button type="button" class="btn btn-info">Lista de boleias</button> </a></li>
                            </ul>

                        </div>
                    </div>


                </div>
                <div class="col-lg-6">
                    <div class="form-wrapper">
                        <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                            <div class="panel panel-skin">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Criar nova boleia! </h3>
                                </div>
                                <div class="panel-body">
                                    <form role="form" class="lead" action="inserir_boleia_membro" method="post">


                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Origem</label>
                                                    <select  name="origem" id="origem" class="form-control">

                                                        <?php
                                                        foreach($dadosBoleia as $row){
                                                            ?>
                                                            <option value='<?=$row->id?>'><?=$row->name?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6" >
                                                <div class="form-group">
                                                    <label>Destino</label>
                                                    <select name="destino" id="destino" class="form-control" >
                                                        <?php
                                                        //precisa do nameclean e do id (porque o CI nao deixa passsar duas propriedades no option)
                                                        foreach($dadosBoleia as $row){?>
                                                            <option value='<?=$row->id?>'><?=$row->name?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Partida</label>
                                                    <input type="datetime-local" name="data_partida" id="data_partida" class="form-control input-md">
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Chegada</label>
                                                    <input type="datetime-local" name="data_chegada" id="data_chegada" class="form-control input-md" >
                                                </div>
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-xs-6 col-sm-5 col-md-6">
                                                <div class="form-group">
                                                    <label>Matricula:</label>
                                                    <input type="text" name="matricula" id="matricula" class="form-control input-md" placeholder="XX-XX-XX">
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-md-6">
                                                <div class="form-group">
                                                    <label>Lugares disponiveis:</label>
                                                    <input type="text" name="lugares" id="lugares" class="form-control input-md">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-offset-3 col-sm-5" style="text-align: center	">
                                                    <div class="form-group">
                                                        <label for="economato" class="col-form-label">Deseja levar Economato</label>
                                                        <div>
                                                            <input type="radio" name="economato" id="economato_sim" value="1"/>
                                                            <label for="economato_sim" >Sim</label>
                                                        </div>

                                                        <div>
                                                            <input type="radio" name="economato" id="economato_nao" value="2"/>
                                                            <label for="economato_nao" >Não</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="Submit"  value="Submeter Pedido" class="btn btn-skin btn-block btn-lg">



                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




</body>

</html>
