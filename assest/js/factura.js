/*function MNuevoFactura(){
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
    type:"POST",
     url:"vista/factura/FNuevoFactura.php",
     data:obj,
     success:function(data){
        $("#content-default").html(data)
     }

    })
}

function regFactura() {
    var formData = new FormData($("#FRegFactura")[0]);

    

        $.ajax({
            type:"POST",
             url:"controlador/facturaControlador.php?ctrRegFactura",
             data:formData,
             cache:false,
             contentType:false,
             processData:false,
             success:function(data){
                //console.log(data)
                if(data="ok"){
                    Swal.fire({
                        title: "la Factura ha sido registrado",
                        icon: "success",
                        showConfirmButton: false,
                        timer:1000
                      })
                      setTimeout(function(){
                        location.reload()
                      },1200)
                }

                else{
                    Swal.fire({
                        title: "ERROR!",
                        icon: "error",
                        showConfirmButton: false,
                        timer:1000
                      })
                }
             }
        
            })

    
   
}


function FEditFactura(id){
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
    type:"POST",
     url:"vista/factura/FEditFactura.php?id="+id,
     data:obj,
     success:function(data){
        $("#content-default").html(data)
     }

    })
}


function editFactura(){
    //console.log(data)
    var formData =new FormData($("#FEditFactura")[0])

        
        
        $.ajax({
            type:"POST",
             url:"controlador/facturaControlador.php?ctrEditFactura",
             data:formData,
             cache:false,
             contentType:false,
             processData:false,
             success:function(data){
                //console.log(data)
            
                if(data="ok"){
                   
                    Swal.fire({
                        icon: "success",
                        showConfirmButton: false,
                        title: "la Factura ha sido ACTUALIZADO",
                        timer:1000
                      })
                      setTimeout(function(){
                        location.reload()
                      },1200)
                      
                }else{
                    Swal.fire({
                        title: "ERROR!",
                        icon: "error",
                        showConfirmButton: false,
                        timer:1000
                      })
                }
             }
        
            })

    

}

function MElitUsuario(id){
  
    var obj={id:id}
Swal.fire({
    title: "estas seguro de eliminar usuario",
    icon: "warning",
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar',
   
}).then(result=>{
    if(result.isConfirmed){
        $.ajax({
        type:"POST",
        url:"controlador/usuarioControlador.php?ctrEliUsuario",
        data:obj,
         success:function(data){
            
            if(data=="ok"){
                location.reload()
            }else{
                Swal.fire({
                    icon: "error",
                    showConfirmButton: false,
                    title: "ERROR",
                    text:"el usuario NO ha sido eliminado",
                    timer:1200
                  })
            }
        }
            
        }
       
    )
    }
})
}*/


/* variables globales */

var host="http://localhost:5000/"
        

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

            }
        })}

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
           numFactura()
        }
    })

}

/*--
generar factura
---*/

function numFactura(){
    let obj=""

    $.ajax({
        type:"POST",
        url:"controlador/facturaControlador.php?ctrNumFactura",
        data:obj,
        success:function(data){
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
        }
    })

}

function calcularPreProd(){
    let cantPro=parseInt(document.getElementById("cantidadProducto").value)
    let descProducto=parseFloat(document.getElementById("descProducto").value)
    let preUnit=parseFloat(document.getElementById("preUnitario").value)

    let preProducto=preUnit-descProducto
   
    document.getElementById("preTotal").value=preProducto*cantPro
}