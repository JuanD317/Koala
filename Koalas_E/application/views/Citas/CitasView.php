<div class="container-fluid text-light">
  <div class="row">
    <div class="col-lg-12">
      <h1>Citas</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url() ?>index.php/Citas/newCitas" method="POST" id="formCitas">
        <input type="hidden" id="txtIdCitas" name="txtIdCitas">
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="form-group">
              <label for="slcMascota">Mascota</label>
              <select name="slcMascota" id="slcMascota" class="select2 form-control">
                <option value="-1">Seleccione</option>
                <?php foreach ($listMascotas as $key_mascota => $mascota): ?>
                  <option value="<?= $mascota->ID_Mascota ?>"><?= $mascota->nombreMascota ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="txtFecha">Fecha</label>
              <input type="text" class="form-control datepicker" id="txtFecha" name="txtFecha">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="txtDescripcion">Descripcion de Cita</label>
              <textarea name="txtDescripcion" id="txtDescripcion" cols="1" rows="3" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="slcServicio">Servicio</label>
              <select name="slcServicio[]" id="slcServicio" class="select2 form-control" onchange="DetalleServicio()" multiple="multiple">
                <?php foreach ($listServicios as $key_servicio => $servicio): ?>
                  <option value="<?= $servicio->ID_Servicio ?>"><?= $servicio->Nombre ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row" style="display: none;" id="rowDetalleServicio">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Seleccione los complementos de servicios</label>
              <div id="resultServicio"></div>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group text-left" id="btnAdd">
              <button class="btn btn-outline-success btn-lg" type="submit">Guardar Cita</button>
            </div>
            <div class="form-group text-left" id="btnEdit" style="display: none;">
              <button class="btn btn-outline-info btn-lg" type="button" onclick="UpdateCitas()">Editar</button>
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
                <th>Certificacion</th>
                <th>Departamento</th>
                <th>Citas</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listCitas as $key_Citas => $Citas): ?>
                <tr>
                  <td><?= $Citas->Nombre ?></td>
                  <td><?= $Citas->Descripcion ?></td>
                  <td><?= $Citas->FechaCita ?></td>
                  <td>
                    <button class="btn btn-outline-warning btn-lg" type="button" onclick="ChargeCitas('<?= $Citas->ID_Cita ?>')">Editar</button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>



  <script>

    $(document).ready(function(){
      $(".datepicker").datepicker({
        autoclose: "TRUE",
        format: "yyyy-mm-dd"
      });
    });

    function ChargeCitas(id_Citas, id_departamento, Citas, id_certificacion){
      $("#txtIdCitas").val(id_Citas);
      $("#slcDepartamento").val(id_departamento).trigger("change");
      $("#slcCertificaciones").val(id_certificacion).trigger("change");
      $("#txtCitas").val(Citas);

      $("#btnAdd").hide();
      $("#btnEdit").show();
    }

    function UpdateCitas(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/Citas/updateCitas",
        data: $("#formCitas").serialize(),
        success: function(){
          location.reload();
        }
      });

    }

    function DetalleServicio(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/Citas/detalleServicio",
        data: $("#formCitas").serialize(),
        success: function(html){
          $("#rowDetalleServicio").show();
          $("#resultServicio").html(html);
        }
      });
    }
  </script>