<?php 

//=====================================================================================================================
// Fichero :V_Login.php
// Creado por : Francisco Rojas Rodriguez
// Fecha : 18/12/2015
// Clase que contiene una de las vistas del sistema
//=====================================================================================================================

Class Login
{

function __construct()
{
}

function DisplayContent($idioma)
{
	global $procesadores;
	global $controladores;
	global $identificadores;
	global $identificadoresPrivados;
	global $RutaRelativaControlador;
	
	
	
	
	//Aqui va el cuerpo principal de la pagina
?>
	<section id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section">
                <div class="container">
                  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                      <form role="form" action="<?php echo $procesadores[$identificadores['Login']]; ?>" method="POST">
                        <div class="form-group has-feedback">
                          <label class="control-label" for="exampleInputEmail1"><?php echo $idioma['Login']?></label>
                          <input name="LoginL" class="form-control input-sm" id="exampleInputEmail1" placeholder="Nombre de usuario" type="text">
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="exampleInputPassword1"><?php echo $idioma['Pass']?></label>
                          <input name="PassL" class="form-control input-sm" id="exampleInputPassword1" placeholder="Contraseña" type="password">
                        </div>
                        <button type="submit" class="btn btn-default"><?php echo $idioma['Aceptar']?></button>
                      </form>
                    </div>
                    <div class="col-md-4"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php

}

}

?>