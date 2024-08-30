<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       
    </div>
    
    <!-- Main content -->
    <div class="content">
        <!-- Encabezado -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Encabezado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group row col-md-9">
                        <div class="form-group col-md-3">
                            <label for="">#factura</label>
                            <input type="number" class="form-control" name="numFactura" id="numFactura" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="actEconomica">#Actividad Económica</label>
                            <select name="actEconomica" id="actEconomica" class="form-control">
                                <option value="106140">Servicios de comercio</option>
                                <option value="106140">Servicios de comercio</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Tipo de Documento</label>
                            <select name="tpDocumento" id="tpDocumento" class="form-control">
                                <option value="1">Ninguno</option>
                                <option value="1">Cedula</option>
                                <option value="5">NIT</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">NIT/CI</label>
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" name="emailCliente" id="emailCliente">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Razon Social</label>
                            <input type="text" class="form-control" name="rsCliente" id="rsCliente">
                        </div>
                    </div>
                </div>

                <div class="form-group row col-md-3">
                    <div class="card">
                        <div class="input-group sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Subtotal</span>
                            </div>
                            <input type="text" class="form-control" name="subTotal" id="subTotal" value="0.00" readonly>
                        </div>

                        <div class="input-group sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descuento</span>
                            </div>
                            <input type="text" class="form-control" name="descAdicional" id="descAdicional" value="0.00">
                        </div>

                        <div class="input-group sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Total</span>
                            </div>
                            <input type="text" class="form-control" name="totApagar" id="totApagar" value="0.00" readonly>
                        </div>

                        <div class="card-footer">
                            <label for="">Metodo de pago</label>
                            <div class="input-group">
                                <select name="metPago" id="metPago" class="form-control">
                                    <option value="0"></option>
                                    <option value="1">Efectivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-success" onclick="emitirFactura()">Guardar</button>
            </div>
        </div>
    <!----------------------------->

    <!-- CARRITO -->
 <!-- VIDEO MINUTO 38:40 -->

    
    <div class="card">
            <div class="card-header">
                <h3 class="card-title">Encabezado</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group row col-md-9">
                        <div class="form-group col-md-3">
                            <label for="">#factura</label>
                            <input type="number" class="form-control" name="numFactura" id="numFactura" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="actEconomica">#Actividad Económica</label>
                            <select name="actEconomica" id="actEconomica" class="form-control">
                                <option value="106140">Servicios de comercio</option>
                                <option value="106140">Servicios de comercio</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Tipo de Documento</label>
                            <select name="tpDocumento" id="tpDocumento" class="form-control">
                                <option value="1">Ninguno</option>
                                <option value="1">Cedula</option>
                                <option value="5">NIT</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">NIT/CI</label>
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" name="emailCliente" id="emailCliente">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Razon Social</label>
                            <input type="text" class="form-control" name="rsCliente" id="rsCliente">
                        </div>
                    </div>
                </div>

                <div class="form-group row col-md-3">
                    <div class="card">
                        <div class="input-group sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Subtotal</span>
                            </div>
                            <input type="text" class="form-control" name="subTotal" id="subTotal" value="0.00" readonly>
                        </div>

                        <div class="input-group sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descuento</span>
                            </div>
                            <input type="text" class="form-control" name="descAdicional" id="descAdicional" value="0.00">
                        </div>

                        <div class="input-group sm-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Total</span>
                            </div>
                            <input type="text" class="form-control" name="totApagar" id="totApagar" value="0.00" readonly>
                        </div>

                        <div class="card-footer">
                            <label for="">Metodo de pago</label>
                            <div class="input-group">
                                <select name="metPago" id="metPago" class="form-control">
                                    <option value="0"></option>
                                    <option value="1">Efectivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="button" class="btn btn-success" onclick="emitirFactura()">Guardar</button>
            </div>
        </div>


     <!----------------------------->

    </div>
</div>
