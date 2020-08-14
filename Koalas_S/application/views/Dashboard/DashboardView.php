<!-- ***** Wellcome Area Start ***** -->
<section class="bg-white clearfix first-section" id="home">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-2 col-sm-6">
                <h1>Usuarios</h1>
            </div>
            <div class="col-lg-10 col-sm-6">
                <h1>Controlador KOALA</h1>
            </div>
        </div>
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <form action="<?= base_url() ?>index.php/User/NewUser" method="POST">
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtNombre">Nombre</label>
                                <input type="text" id="txtNombre" name="txtNombre" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtApellido">Apellido</label>
                                <input type="text" id="txtApellido" name="txtApellido" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtUser">Usuario</label>
                                <input type="text" id="txtUser" name="txtUser" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="txtPass">Contraseña</label>
                                <input type="password" id="txtPass" name="txtPass" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-group text-left">
                                <button class="btn btn-outline-success btn-lg" type="submit">Guardar Usuario</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>a</th>
                                <th>b</th>
                                <th>c</th>
                                <th>d</th>
                                <th>e</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>a</td>
                                <td>e</td>
                                <td>i</td>
                                <td>o</td>
                                <td>u</td>
                            </tr>
                            <tr>
                                <td>a</td>
                                <td>e</td>
                                <td>i</td>
                                <td>o</td>
                                <td>u</td>
                            </tr>
                            <tr>
                                <td>a</td>
                                <td>e</td>
                                <td>i</td>
                                <td>o</td>
                                <td>u</td>
                            </tr>
                            <tr>
                                <td>a</td>
                                <td>e</td>
                                <td>i</td>
                                <td>o</td>
                                <td>u</td>
                            </tr>
                            <tr>
                                <td>a</td>
                                <td>e</td>
                                <td>i</td>
                                <td>o</td>
                                <td>u</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="">Comentario</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group text-justify">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab vero esse, magnam libero est labore vel architecto officia unde quam modi voluptatibus odit enim veritatis. Cum repellendus, quibusdam amet eum! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab vero esse, magnam libero est labore vel architecto officia unde quam modi voluptatibus odit enim veritatis. Cum repellendus, quibusdam amet eum!</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab vero esse, magnam libero est labore vel architecto officia unde quam modi voluptatibus odit enim veritatis. Cum repellendus, quibusdam amet eum!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= base_url() ?>assets/Ca/img/scr-img/app-3.jpg" alt="image test" class="w-100">
                    </div>
                    <div class="col-md-6 text-justify">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur porro laudantium magnam minima alias, labore illo error, recusandae corrupti ducimus quidem nesciunt vel id temporibus quae. Consectetur amet, velit libero!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur porro laudantium magnam minima alias, labore illo error, recusandae corrupti ducimus quidem nesciunt vel id temporibus quae. Consectetur amet, velit libero!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Wellcome Area End ***** -->