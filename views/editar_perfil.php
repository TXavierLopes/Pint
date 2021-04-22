

	<!-- Section: intro -->
    <div class="container">
        <h1>Edit Profile</h1>
        <hr>
        <div class="row">
            <form id="myForm" enctype="multipart/form-data" class="form-horizontal" action="editar_perfil_membro" onSubmit="return validate()" role="form" method="post" >
                <!-- left column -->
                <br/>
                <div class="col-md-3"  style="padding: 70px">
                    <div class="text-center">
                        <img src="<?=$usr['image']?>" class="avatar img-circle" alt="avatar" width="150px" height="150px" >
                        <h6>Faça um novo upload</h6>

                        <input type="file" class="form-control" src="" name="file">
                    </div>
                </div>

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <br/>
                    <h3>Informação Pessoal</h3>
                    <br>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nome:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?=$usr['name']?>" name="name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Contacto:</label>
                        <div class="col-lg-8">
                            <input size="9" maxlength="9" class="form-control" type="Contacto" value="<?=$usr['contact']?>" name="contact">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="<?=$usr['email']?>" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" value="" placeholder="Nova Password" name="password" id="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Confirm password:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" value="" placeholder="Confirme a Password" name="password_confirmation" id="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-8">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                            <span></span>
                            <a href="perfilmembro"><input type="button" class="btn btn-default" value="Voltar">
                        </div>
                    </div>
            </form>
        </div>
    </div>
    </div>
    <hr>
    <script>
        function validate(){

            if(!document.getElementById("password").value==document.getElementById("password_confirmation").value)  return false;

            return document.getElementById("password").value==document.getElementById("password_confirmation").value;
            return false;
        }
    </script>