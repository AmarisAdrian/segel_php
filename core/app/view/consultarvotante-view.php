<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">Consultar votante</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="?view=home">Home</a></li>
                        <li class="breadcrumb-item active"><a href="?view=inscripcion">Inscripciones</a></li>
                        <li class="breadcrumb-item active">Consulta</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3>
                            <div class="dropdown  text-light">
                                <i class="fa fa-search"></i> Documento
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input class="form-control" id="noDocumentoVotante" name="noDocumentoVotante"
                                    type="number" placeholder="Digite el número de identidad" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" name="btnBuscarVotante"
                                        id="btnBuscarVotante" type="button" data-toggle="#"
                                        data-target="#informacion" aria-expanded="false" aria-controls="collapseExample">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 collapse" id="informacion">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3>
                            <div class="dropdown text-light">
                                <i class="fa fa-address-card-o"></i> Informacion personal
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="InformacionVotante" class="InformacionVotante"></div>
                </div>
            </div>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 collapse" id="informacion">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3>
                            <div class="dropdown text-light">
                                <i class="fa fa-flag"></i> Informacion puesto de votacion
                            </div>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="InformacionPuestoVotante" class="InformacionPuestoVotante"></div>
                </div>
            </div>
        </div>
    </div>
</section>