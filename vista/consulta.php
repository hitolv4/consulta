 <?php 
 /**
  * vista consulta ci
  */
 
 $title="Consultar Asegurado";



  ?>
<!DOCTYPE html>
 <html lang="es">
 <head>
<?php include("head.php"); ?>
<style>
.peq{
  width: 40%;
}

.box-shadow{
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
} 
#nombre{
  margin-bottom: 20px;
}

</style>
 </head>
 <body>
 <?php include("navbar.php") ?>
 	<div class="container">

 		<div class="panel panel-primary peq center-block box-shadow">
 			<div class="panel panel-heading">
 				<h4 "><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Asegurado.</h4>
 			</div>	
 			<div class="panel-body">
				<form class="form-horizontal"  id="datos_asegurado" action="../modulos/consultarasegurado.php" method="POST">
					<div class="row">
            <div class="col-md-11 col-md-offset-1">
              <div class="form-group">
                <label for="q" >Tipo - Cédula:</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="tipo" name="tipo" placeholder="T">
                  <span class="input-group-addon">-</span>              
                  <input type="text" class="form-control" id="ci" name="ci" placeholder="Cedula de Identidad" >
                </div>
              </div>
            </div>
          </div>

          <input type="text" class="form-control-static" id="nombre" name="nombre" value="" disabled>

          
          <div class="row">
            <div class="col-md-12 ">
              <div class="form-group">
                <button type="button"  class="btn btn-default center-block " onclick="Basegurado();" >
                <span class="glyphicon glyphicon-search" ></span> Buscar</button>
                <span id="loader"></span>
              </div>
            </div>
          </div>
				</form>
      </div>
    </div>


 		<div class="panel panel-primary">

 			<div class="panel panel-heading">
				
 				<h4 "><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Polizas.</h4>
 				
 			</div>	
 			<div class="panel-body">
 				
			
		<table class="table table-striped" id="tablapol">
    <thead>
      <tr>
        <th>Sts</th>
        <th>Prod</th>
        <th>Poliza</th>
        <th>Fecha I</th>
        <th>Fecha F</th>
        <th>Id Poliza</th>
        <th>Botton</th>

      </tr>
    </thead>
    <tbody id="tbodypol"></tbody>

  </table>

 			</div>			
 		</div>

 		<div class="panel panel-primary">

 			<div class="panel panel-heading">
				
 				<h4 "><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Certificados.</h4>
 				
 			</div>	
 			<div class="panel-body">
 				
			
		<table class="table table-striped" id="tablacer">
    <thead>
      <tr>
        <th>Sts</th>
        <th>Nro Cert</th>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Fecha Ing</th>
        <th>Fec Exec</th>
 

      </tr>
    </thead>
    <tbody id="tbodycer"></tbody>

  </table>

  <table class="table table-striped" id="tablaram">
    <thead>
      <tr>
        <th>Sts</th>
        <th>Cod</th>
        <th>Descripcion</th>
        <th>Fec Exec</th>
        <th>Cod Plan</th>
        <th>Rev Plan</th>
        <th>Desc Plan</th>

 

      </tr>
    </thead>
    <tbody id="tbodyram"></tbody>

  </table>

 			</div>			
 		</div>


		<div class="panel panel-primary">

 			<div class="panel panel-heading">
				
 				<h4 "><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Asegurados.</h4>
 				
 			</div>	
 			<div class="panel-body">
 				
			
		<table class="table table-striped" id="tablaase">
    <thead>
      <tr>
        <th>Sts</th>
        <th>Cedula</th>
        <th>Nombre del Asegurado</th>
        <th>Edad</th>
        <th>Fec Nac</th>
        <th>Fec Ing</th>
        <th>Parentesco</th>
        <th>Id Asegurado</th>

      </tr>
    </thead>
    <tbody id="tbodyase"></tbody>

  </table>

 			</div>			
 		</div>



		<div id="resultado">resultado</div>



	</div>
 <?php include("footer.php") ?>	
 </body>
 </html>