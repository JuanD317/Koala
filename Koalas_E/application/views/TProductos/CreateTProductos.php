<div class="container-fluid text-light">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1>Tipo Servicio</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url() ?>index.php/TProductos/newTProductos" method="POST" id="formTProductos">
        <input type="hidden" id="txtIdTProductos" name="txtIdTProductos">
        <div class="row mb-3">
          <div class="col-md-12">
            <div class="form-group">
              <label for="txtTProductos">Tipo Servicio</label>
              <input type="text" id="txtTProductos" name="txtTProductos" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group text-left" id="btnAdd">
              <button class="btn btn-outline-success btn-lg" type="submit">Agregar</button>
            </div>
            <div class="form-group text-left" id="btnEdit" style="display: none;">
              <button class="btn btn-outline-info btn-lg" type="button" onclick="UpdateTProductos()">Editar</button>
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
              <?php foreach ($listTProductos as $key_TProductos => $TProductos): ?>
                <tr>
                  <td><?= $TProductos->TipoProducto ?></td>
                  <td>
			        	<button class="btn btn-outline-warning btn-lg" type="button" onclick="ChargeTProductos('<?= $TProductos->ID_TipoProducto ?>','<?= $TProductos->TipoProducto ?>')">Editar</button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>



  <script>
    function ChargeTProductos(id_TProductos, nombre){
      $("#txtIdTProductos").val(id_TProductos);
      $("#txtTProductos").val(nombre);

      $("#btnAdd").hide();
      $("#btnEdit").show();
    }

    function UpdateTProductos(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/TProductos/updateTProductos",
        data: $("#formTProductos").serialize(),
        success: function(){
          location.reload();
        }
      })

    }
  </script>