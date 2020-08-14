<div class="container-fluid text-light">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1>Sexo</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url() ?>index.php/Sex/newSexo" method="POST" id="formSexo">
        <input type="hidden" id="txtIdSexo" name="txtIdSexo">
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="form-group">
              <label for="txtSexo">Sexo</label>
              <input type="text" id="txtSexo" name="txtSexo" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group text-left" id="btnAdd">
              <button class="btn btn-outline-success btn-lg" type="submit">Agregar</button>
            </div>
            <div class="form-group text-left" id="btnEdit" style="display: none;">
              <button class="btn btn-outline-info btn-lg" type="button" onclick="UpdateSexo()">Editar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <table class="table nowrap">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listSexo as $key_Sexo => $Sexo): ?>
                <tr>
                  <td><?= $Sexo->Nombre ?></td>
                  <td>
                  	<div class="row">
                  		<div class="col-md-6">
                  			<div class="form-group">
			                    <button class="btn btn-outline-warning btn-lg" type="button" onclick="ChargeSexo('<?= $Sexo->ID_Sexo ?>','<?= $Sexo->Nombre ?>')">Editar</button>
                  			</div>
                  		</div>
                  		<div class="col-md-6">
                  			<div class="form-group">
			                    <form action="<?= base_url() ?>index.php/Sex/deleteSexo" method="POST">
			                    	<input type="hidden" value="<?= $Sexo->ID_Sexo ?>" name="txtIdSexo">
			                    	<button class="bnt btn-outline-danger btn-lg" type="submit">Eliminar</button>
			                    </form>
                  			</div>
                  		</div>
                  	</div>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>



  <script>
    function ChargeSexo(id_Sexo, nombre){
      $("#txtIdSexo").val(id_Sexo);
      $("#txtSexo").val(nombre);

      $("#btnAdd").hide();
      $("#btnEdit").show();
    }

    function UpdateSexo(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/Sex/updateSexo",
        data: $("#formSexo").serialize(),
        success: function(){
          location.reload();
        }
      })

    }
  </script>