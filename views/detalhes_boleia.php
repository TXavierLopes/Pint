 <style> 
#example1 {
    border: 2px solid red;
    padding: 10px;
    border-radius: 25px;
    border-color: #ebebe0;
    background-color: white;
}
</style>
<section class="feature-area section-gap" id="service" style="margin-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" >
                <div  class="single-feature d-flex flex-row pb-30">
                    <div class="icon">
                       <center><h3> <strong>Detalhes de Boleia <br/> <br/> <br/> <br/></strong></h3></center> 
                        <span class="lnr lnr-rocket"></span>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-lg-12" style="margin-top: 0px;" id="example1" style="">
              <center> <div class="single-feature d-flex flex-row pb-30">
                    <div class="icon">
                        <span class="lnr lnr-heart-pulse">Boleia fornecida por: <?= $nomes[0]->name;?></span>
                        <br/> <br> <br>
                    </div>
                    <div class="desc">
                        <img src="img/percurso.png" alt="" width="35" height="35" ><strong>  <?=  $nomes[0]->origem ?> para <?= $nomes[0]->destino?><br/> <br/></strong>
                    </div>
                    <div class="single-feature d-flex flex-row pb-30">
                        <div class="icon">
                            <span class="lnr lnr-paw"></span>
                        </div>
                        <div class="desc">
                            <img src="img/hora.png" alt="" width="35" height="35"><strong>  Inicio: <?= $nomes[0]->hora_inicio?> <br/> <br/></strong>
                        </div>
                    </div>
                    <div class="single-feature d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-users"></span>
                        </div>
                        <div class="desc">
                            <img src="img/calendario.png" alt="" width="35" height="35"><strong> Fim: <?= $nomes[0]->hora_fim?> <br/> <br/></strong>
                        </div>
                    </div>
                    <div class="single-feature d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-users"></span>
                        </div>
                        <div class="desc">
                            <img src="img/passageiro.png" alt="" width="35" height="35"><strong>  Passageiros:
                                   <br/> <br/></strong>
                            <p>


                                <?php

                                foreach ($viajantes as $row) {
                                    echo $row->name;
                                    echo '<br>';
                                } ?>
<br/>
                                <br/>

    <center><a href="<?php echo base_url() . 'index.php/Membro_controller/inserir_viajante/'. $id_boleia; ?> " class="btn btn-success">
                                    Registar-me na boleia</a> </center>
                            </p>
                        </div></center> 
                        <center><div class="desc" >
                      
                        <div class="icon" >
                        <br> <br/>
                        <a href="<?= base_url('index.php/Membro_controller/boleiasmembro')?>"> <button type="button" class="btn">Voltar</button> </a>
                        <span class=">lnr lnr-rocket"></span>
                    </div>
                    </div></center>
                    </div>
                </div>
            </div>
        </div>
</section>