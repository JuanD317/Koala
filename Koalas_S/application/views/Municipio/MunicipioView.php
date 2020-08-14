<div class="container-fluid text-light">
  <div class="row">
    <div class="col-lg-12">
      <h1>Municipality</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form action="<?= base_url() ?>index.php/Municipio/newMunicipio" method="POST" id="formMunicipio">
        <input type="hidden" id="txtIdmunicipio" name="txtIdmunicipio">
        <div class="row mb-3">
          <div class="col-md-4">
            <div class="form-group">
              <label for="slcCertificaciones">Certification</label>
              <select name="slcCertificaciones" id="slcCertificaciones" class="select2 form-control">
                <option value="-1">Select</option>
                <?php foreach ($listCertificacion as $key_certificacion => $certificacion): ?>
                  <option value="<?= $certificacion->ID_Certificacion ?>"><?= $certificacion->Nombre ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="slcDepartamento">Department</label>
              <select name="slcDepartamento" id="slcDepartamento" class="select2 form-control">
                <option value="-1">Seleccione</option>
                <?php foreach ($listDepartamento as $key_departamento => $departamento): ?>
                  <option value="<?= $departamento->ID_Departamento ?>"><?= $departamento->Departamento ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="txtmunicipio">Municipality</label>
              <input type="text" id="txtMunicipio" name="txtMunicipio" class="form-control">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="form-group text-left" id="btnAdd">
              <button class="btn btn-outline-success btn-lg" type="submit">Add</button>
            </div>
            <div class="form-group text-left" id="btnEdit" style="display: none;">
              <button class="btn btn-outline-info btn-lg" type="button" onclick="Updatemunicipio()">Editar</button>
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
                <th>Certification</th>
                <th>Department</th>
                <th>Municipality</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listMunicipio as $key_municipio => $municipio): ?>
                <tr>
                  <td><?= $municipio->Descripcion ?></td>
                  <td><?= $municipio->Departamento ?></td>
                  <td><?= $municipio->Municipio ?></td>
                  <td>
                    <button class="btn btn-outline-warning btn-lg" type="button" onclick="Chargemunicipio('<?= $municipio->ID_Municipio ?>','<?= $municipio->ID_Departamento ?>', '<?= $municipio->Municipio ?>', '<?= $municipio->ID_Certificacion ?>')">Edit</button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>



  <script>
    function Chargemunicipio(id_municipio, id_departamento, municipio, id_certificacion){
      $("#txtIdmunicipio").val(id_municipio);
      $("#slcDepartamento").val(id_departamento).trigger("change");
      $("#slcCertificaciones").val(id_certificacion).trigger("change");
      $("#txtMunicipio").val(municipio);

      $("#btnAdd").hide();
      $("#btnEdit").show();
    }

    function Updatemunicipio(){

      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>index.php/Municipio/updateMunicipio",
        data: $("#formMunicipio").serialize(),
        success: function(){
          location.reload();
        }
      })

    }
  </script>