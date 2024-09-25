
/* variables globales */

var host="http://localhost:5000/"
var codSistema="775FA42BE90F7B78EF98F57"
var cuis="9272DC05"
var nitEmpresa=338794023
var rsEmpresa="NEOMAC SRL"
var telEmpresa="9422560"
var dirEmpresa="Calle Pucara 129 AVENIDA 7MO ANILLO NRO. 7550 ZONA/BARRIO: TIERRAS NUEVAS UV:0135 MZA: 007"
var token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w"  

var cufd;
var codControlCufd;
var fechaVigCufd;
var leyenda;

function verificarComunicacion(){
    var obj=""
    $.ajax({
        type:"POST",
        url:"http://localhost:5000/api/CompraVenta/comunicacion",
        data:obj,
        cache:false,
        contentType:"application/json",
        success:function(data){

            if(data["transaccion"]==true){
                document.getElementById("comunSiat").innerHTML="Conectado"
                document.getElementById("comunSiat").className="badge badge-success"
            }}
         }).fail(function(jqXHR, textStatus, errorThrown){
            if(jqXHR.status==0){
                document.getElementById("comunSiat").innerHTML="Desconectado"
                document.getElementById("comunSiat").className="badge badge-danger"
}  })}

 setInterval(verificarComunicacion,2000)


function busCliente(){
    let nitCliente=document.getElementById("nitCliente").value

    var obj={
        nitCliente:nitCliente
    }
    $.ajax({
        type:"POST",
        url:"controlador/clienteControlador.php?ctrBusCliente",
        data:obj,
        dataType:"json",
        success:function(data){
           if(data["email_cliente"]==""){
            document.getElementById("emailCliente").value="null"
           }else{
            document.getElementById("emailCliente").value=data["email_cliente"]
           }

           document.getElementById("rsCliente").value=data["razon_social_cliente"]
           document.getElementById("idCliente").value=data["id_cliente"]
           numFactura()
        }
    })

}

/*--generar factura---*/

function numFactura(){
    let obj=""

    $.ajax({
        type:"POST",
        url:"controlador/facturaControlador.php?ctrNumFactura",
        data:obj,
        success:function(data){
           // console.log(data)
        document.getElementById("numFactura").value=data
        }
    })
}


function busProducto(){
    let codProducto=document.getElementById("cod_producto").value

    var obj={
        codProducto:codProducto  
    }
    
    $.ajax({
        type:"POST",
        url:"controlador/productoControlador.php?ctrBusProducto",
        data:obj,
        dataType:"json",
        success:function(data){
          document.getElementById("conceptoPro").value=data["nombre_producto"];
          document.getElementById("uniMedida").value=data["unidad_medida"];
          document.getElementById("preUnitario").value=data["precio_producto"];

          document.getElementById("uniMedidaSin").value=data["unidad_medida_sin"];
          document.getElementById("codproducto_sin").value=data["cod_producto_sin"];
        }
    })

}

function calcularPreProd(){
    let cantPro=parseInt(document.getElementById("cantidadProducto").value)
    let descProducto=parseFloat(document.getElementById("descProducto").value)
    let preUnit=parseFloat(document.getElementById("preUnitario").value)


    let preProducto=preUnit*cantPro
   
    document.getElementById("preTotal").value=preProducto-descProducto
}

/*--
generar Carrito   video 15 17:51
---*/

var arregloCarrito=[]

var listaDetalle=document.getElementById("listaDetalle")

function agregarCarrito(){
let actEconomica=document.getElementById("actEconomica").value
let codProducto=document.getElementById("cod_producto").value
let codproducto_sin=parseInt(document.getElementById("codproducto_sin").value)
let conceptoPro=document.getElementById("conceptoPro").value
let cantProducto=parseInt(document.getElementById("cantidadProducto").value)
let uniMedida=document.getElementById("uniMedida").value  
let uniMedidaSin=parseInt(document.getElementById("uniMedidaSin").value)

let preUnitario=parseFloat(document.getElementById("preUnitario").value)
let descProducto=parseFloat(document.getElementById("descProducto").value)  
let preTotal=parseFloat(document.getElementById("preTotal").value)

/*console.log("actEconomica:", actEconomica, 
    "codProducto:", codProducto, 
    "codproducto_sin:", codproducto_sin, 
    "conceptoPro:", conceptoPro, 
    "cantProducto:", cantProducto, 
    "uniMedida:", uniMedida, 
    "uniMedidaSin:", uniMedidaSin, 
    "preUnitario:", preUnitario, 
    "descProducto:", descProducto, 
    "preTotal:", preTotal);*/

let objDetalle={
actividadEconomica:actEconomica,
codigoProductoSin:codproducto_sin,
codigoProducto:codProducto,
descripcion:conceptoPro,
cantidad:cantProducto,
unidadMedida:uniMedidaSin,
precioUnitario:preUnitario,
montoDescuento:descProducto,
subtotal:preTotal

}

arregloCarrito.push(objDetalle)
dibujarTablaCarrito()


document.getElementById("cod_producto").value=""
document.getElementById("conceptoPro").value=""
document.getElementById("cantidadProducto").value=0
document.getElementById("uniMedida").value=""  


document.getElementById("preUnitario").value=""
document.getElementById("descProducto").value="0.00"
document.getElementById("preTotal").value="0.00"
}

function dibujarTablaCarrito(){

listaDetalle.innerHTML=""

arregloCarrito.forEach((detalle)=>{

    let fila=document.createElement("tr");
    fila.innerHTML='<td>'+detalle.descripcion+'</td>'+
                   '<td>'+detalle.cantidad+'</td>'+
                   '<td>'+detalle.precioUnitario+'</td>'+
                   '<td>'+detalle.montoDescuento+'</td>'+
                   '<td>'+detalle.subtotal+'</td>'

               let tdEliminar=document.createElement("td")
               let botoneliminar=document.createElement("button")
               botoneliminar.classList.add("btn","btn-danger")
               botoneliminar.innerText="Eliminar"
               botoneliminar.onclick = () => {
                eliminarCarrito(detalle.codigoProducto);
};

               tdEliminar.appendChild(botoneliminar)
               fila.appendChild(tdEliminar)
                   listaDetalle.appendChild(fila)
})

calcularTotal()
}


function eliminarCarrito(codProducto) {
    console.log("Intentando eliminar el producto con código:",codProducto);
    
    arregloCarrito = arregloCarrito.filter((detalle) => {
        console.log("Revisando producto con código:", detalle.codigoProducto);
        
        if (codProducto != detalle.codigoProducto) {
            console.log("Producto con código", detalle.codigoProducto, "no coincide. Se mantiene en el carrito.");
            return detalle;
        } 
    });

    //console.log("Carrito actualizado:", arregloCarrito);       video 17 minuto 12:56
    dibujarTablaCarrito();
}

function calcularTotal(){
    let totalCarrito=0;
    for (var i=0 ; i<arregloCarrito.length;i ++){
        totalCarrito=totalCarrito+parseFloat(arregloCarrito[i].subtotal)
    }
    //console.log(totalCarrito)
    document.getElementById("subTotal").value=totalCarrito
    let descAdicional=parseFloat(document.getElementById("descAdicional").value)
    totApagar=totalCarrito-descAdicional
    document.getElementById("totApagar").value=totalCarrito-descAdicional
    //console.log(totApagar)
}
/*--==================
obtener cufd
==================---*/

function solicitudCufd(){
    return new Promise((resolve, reject)=>{
        var obj={
            codigoAmbiente:2,
            codigoModalidad:2,
            codigoPuntoVenta:0,
            codigoPuntoVentaSpecified:true,
            codigoSistema:codSistema,
            codigoSucursal:0,
            nit:nitEmpresa,
            cuis:cuis
                }
                $.ajax({
                    type:"POST",
                    url:host+"api/Codigos/solicitudCufd?token="+token,
                    data:JSON.stringify(obj),
                    cache:false,
                    contentType:"application/json",
                    success:function(data){
                        //console.log(data)
                        cufd=data["codigo"]
                        codControlCufd=data["codigoControl"]
                        fechaVigCufd=data["fechaVigencia"]

                        resolve (cufd)
                    }
                })
    })
}


/*--==================
registrar Cufd
==================---*/
function registrarNuevoCufd(){
    solicitudCufd().then(ok=>{
        if(ok!="" || ok!=null){
            var obj={
                "cufd":cufd,
                "fechaVigCufd":fechaVigCufd,
                "codControlCufd":codControlCufd
            }
            
            $.ajax({
                type:"POST",
                data:obj,
                url:"controlador/facturaControlador.php?ctrNuevoCufd",
                cache:false,
                success:function(data){
                    //console.log(data)
                    if(data=="ok"){
                    $("#panelInfo").before("<span class='text-primary'>Cufd registrado!!!</span><br>")
                }
                else{
                    $("#panelInfo").before("<span class='text-danger'>error de registro curfd!!!</span><br>")
                }
                }
                
            })
        }
    })
}


/*--==================
verificar Cufd
==================---*/
function verificarVigenciaCufd(){
    //fecha actual
let date=new Date()
//obtener el ultimo registro
var obj=""
        $.ajax({
            type:"POST",
            url:"controlador/facturaControlador.php?crtUltimoCufd",
            data:obj,
            cache:false,
            dataType:"json",
            success:function(data){
                //console.log(data)
                //fecha del ultimo cufd de mi bas e de datos 
                let vigCufdActual=new Date(data["fecha_vigencia"])
                //console.log(vigCufdActual)
                if(date.getTime()>vigCufdActual.getTime()){
                    $("#panelInfo").before("<span class='text-warning'>Cufd caducado!!!</span><br>")
                    $("#panelInfo").before("<span>Registrando Cufd...</span><br>")
                    registrarNuevoCufd()
                }else{
                   $("#panelInfo").before("<span class='text-success'>Cufd vigente, puede facturar!!!</span><br>")
                    cufd=data["codigo_cufd"]
                    codControlCufd=data["codigo_control"]
                    fechaVigCufd=data["fecha_vigencia"]
                }
            }
        })
}

/*--==================
Transformar fecha de formato iso 8601
==================---*/
function transformarFecha(fechaISO){
    let fecha_iso=fechaISO.split("T")
    let hora_iso=fecha_iso[1].split(".")
    let fecha=fecha_iso[0]
    let  hora=hora_iso[0]

    let fecha_hora=fecha+" "+hora
    return fecha_hora;
}

/*--==================
solicitar Leyenda
==================---*/
function extraerLeyenda(){
var obj=""
$.ajax({
    type:"POST",
    url:"controlador/facturaControlador.php?crtLeyenda",
    data:obj,
    cache:false,
    dataType:"json",
    success:function(data){
        leyenda=data["desc_leyenda"]
    }
})
}


/*--==================
validar formulario
==================---*/
function validarFormulario(){
let numFactura=document.getElementById("numFactura").value
let nitCliente=document.getElementById("nitCliente").value
let emailCliente=document.getElementById("emailCliente").value
let rsCliente=document.getElementById("rsCliente").value

if(numFactura==null || numFactura.length==0){
    $("#panelInfo").before("<span class='text-danger'>Asegurarse de llenar campos</span><br>")
return false
}else if(nitCliente==null || nitCliente.length==0){
    $("#panelInfo").before("<span class='text-danger'>Asegurarse de llenar campos</span><br>")
    return false
}else if(emailCliente==null || emailCliente.length==0){
    $("#panelInfo").before("<span class='text-danger'>Asegurarse de llenar campos</span><br>")
    return false
}else if(rsCliente==null || rsCliente.length==0){
    $("#panelInfo").before("<span class='text-danger'>Asegurarse de llenar campos</span><br>")
    return false}
    return true
}




/*--==================
emitir factura
==================---*/

function emitirFactura(){
    if(validarFormulario()== true){
    let date=new Date()
    let numFactura=parseInt(document.getElementById("numFactura").value)
    let fechaFactura=date.toISOString()
    let rsCliente=document.getElementById("rsCliente").value
    let tpDocumento=parseInt(document.getElementById("tpDocumento").value)
    let nitCliente=document.getElementById("nitCliente").value
    let metPago=parseInt(document.getElementById("metPago").value)
    let totApagar=parseFloat(document.getElementById("totApagar").value)
    //console.log(totApagar)
    let descAdicional=parseFloat(document.getElementById("descAdicional").value)
    let subTotal=parseFloat(document.getElementById("subTotal").value)
    let usuarioLogin=document.getElementById("usuarioLogin").innerHTML

    let actEconomica=document.getElementById("actEconomica").value
    let emailCliente=document.getElementById("emailCliente").value

    var obj={
        codigoAmbiente:2,
        codigoDocumentoSector:1,
        codigoEmision:1,
        codigoModalidad:2,
        codigoPuntoVenta:0,
        codigoPuntoVentaSpecified:true,
        codigoSistema:codSistema,
        codigoSucursal:0,
        cufd:cufd,
        cuis:cuis,
        nit:nitEmpresa,
        tipoFacturaDocumento:1,
        archivo:null,
        fechaEnvio:fechaFactura,
        hashArchivo:"",
        codigoControl:codControlCufd,
        factura:{
            cabecera:{
                nitEmisor:nitEmpresa,
                razonSocialEmisor: rsEmpresa,
                municipio: "Santa Cruz",
                telefono:telEmpresa,
                numeroFactura:numFactura,
                cuf:"String",
                cufd:cufd,
                codigoSucursal:0,
                direccion:dirEmpresa,
                codigoPuntoVenta:0,
                fechaEmision:fechaFactura,
                nombreRazonSocial:rsCliente,
                codigoTipoDocumentoIdentidad:tpDocumento,
                numeroDocumento:nitCliente,
                complemento:"",
                codigoCliente:nitCliente,
                codigoMetodoPago:metPago,
                numeroTarjeta:null,
                montoTotal:subTotal,
                montoTotalSujetoIva:totApagar,
                tipoCambio:1,
                codigoMoneda:1,
                montoTotalMoneda:totApagar,
                montoGiftCard:0,
                descuentoAdicional:descAdicional,
                codigoExcepcion:0,
                cafc:null,
                leyenda:leyenda,
                usuario:usuarioLogin,
                codigoDocumentoSector:1
            },
            detalle:arregloCarrito
        }

    }
    $.ajax({
        type:"POST",
        url:host+"api/CompraVenta/recepcion",
        data:JSON.stringify(obj),
        cache:false,
        contentType:"application/json",
        processData:false,
        success:function(data){
            console.log(data)
            if(data["codigoResultado"]!=908){
                $("#panelInfo").before("<span class='text-danger'>Error, factura no emitida!!!! </span> <br>")
            }else{
                $("#panelInfo").before("<span> Registrando factura..... </span> <br>")
                let datos={
                    codigoResultado:data["codigoResultado"],
                    codigoRecepcion:data["datoAdicional"]["codigoRecepcion"],
                    cuf:data["datoAdicional"]["cuf"],
                    sentDate:data["datoAdicional"]["sentDate"],
                    xml:data["datoAdicional"]["xml"],
                }
                registrarFactura(datos)
 
            }
           
        }
    })
}
}

function registrarFactura(datos){
    let numFactura=document.getElementById("numFactura").value
    let idCliente=document.getElementById("idCliente").value
    let subTotal=parseFloat(document.getElementById("subTotal").value)
    let descAdicional=parseFloat(document.getElementById("descAdicional").value)
    let totApagar=parseFloat(document.getElementById("totApagar").value)
    let fechaEmision=transformarFecha(datos["sentDate"])
    let idUsuario=document.getElementById("idUsuario").value
    let usuarioLogin=document.getElementById("usuarioLogin").innerHTML


    let obj={
        "codFactura":numFactura,
        "idCliente":idCliente,
        "detalle":JSON.stringify(arregloCarrito),
        "neto":subTotal,
        "descAdicional":descAdicional,
        "total":totApagar,
        "fechaEmision":fechaEmision,
        "cufd":cufd,
        "cuf":datos["cuf"],
        "xml":datos["xml"],
        "idUsuario":idUsuario,
        "usuario":usuarioLogin,
        "leyenda":leyenda
    }
    $.ajax({
        type:"POST",
        url:"controlador/facturaControlador.php?ctrRegistrarFactura",
        data:obj,
        cache:false,
        success:function(data){
            console.log(data)

            if(data=="ok"){
                Swal.fire({
                    icon:"success",
                    showConfirmButton:false,
                    title:"Factura Registrada"
                })
                setTimeout(function(){
                    location.reload()
                }, 1000)
            }else{
                Swal.fire({
                    icon:"error",
                    showConfirmButton:false,
                    title:"Error Registro",
                    timer:1500
                })
            }
       
           
        }
    })
}

function MElitFactura(id){
  
    var obj = {id: id};
    Swal.fire({
        title: "¿ESTÁS SEGURO DE ELIMINAR LA FACTURA?",
        icon: "warning",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirmar',
        denyButtonText: 'Cancelar',
    }).then(result => {
        if(result.isConfirmed){
            $.ajax({
                type: "POST",
                url: "controlador/facturaControlador.php?ctrEliFactura", 
                data: obj,
                success: function(data) {
                    if(data == "ok"){
                        location.reload(); 
                    } else {
                        Swal.fire({
                            icon: "error",
                            showConfirmButton: false,
                            title: "ERROR",
                            text: "La factura NO ha sido eliminada",
                            timer: 1200
                        });
                    }
                }
            });
        }
    });
}


function VerFactura(id){
    $("#modal-default").modal("show");

    var obj = ""; 
    $.ajax({
        type: "POST",
        url: "vista/factura/VerFactura.php?id=" + id,
        data: obj,
        success: function(data) {
            $("#content-default").html(data); 
        }
    });
}
