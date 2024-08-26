function MNuevoProducto(){
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
    type:"POST",
     url:"vista/producto/FNuevoProducto.php",
     data:obj,
     success:function(data){
        $("#content-default").html(data)
     }

    })
}

function regProducto() {
    var formData = new FormData($("#FRegProducto")[0]);
                                            
        $.ajax({
            type:"POST",
             url:"controlador/productoControlador.php?ctrRegProducto",
             data:formData,
             cache:false,
             contentType:false,
             processData:false,
             success:function(data){
                //console.log(data)
                if(data="ok"){
                    Swal.fire({
                        title: "el Producto ha sido registrado",
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
   
function FEditProducto(id){
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
    type:"POST",
     url:"vista/producto/FEditProducto.php?id="+id,
     data:obj,
     success:function(data){
        $("#content-default").html(data)
     }

    })
}

function editProducto(){
    //console.log(data)
    var formData =new FormData($("#FEditProducto")[0])

 
        
        
        $.ajax({
            type:"POST",
             url:"controlador/productoControlador.php?ctrEditProducto",
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
                        title: "el PRODUCTO ha sido ACTUALIZADO",
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

function MElitProducto(id){
    var obj={id:id}
Swal.fire({
    title: "estas seguro de eliminar PRODUCTO",
    icon: "warning",
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar',
   
}).then(result=>{
    if(result.isConfirmed){
        $.ajax({
        type:"POST",
        url:"controlador/productoControlador.php?ctrEliProducto",
        data:obj,
         success:function(data){
            
            if(data=="ok"){
                location.reload()
            }else{
                Swal.fire({
                    icon: "error",
                    showConfirmButton: false,
                    title: "ERROR",
                    text:"el PRODUCTO NO ha sido eliminado",
                    timer:1200
                  })
            }
        }
            
        }
       
    )
    }
})
}

function SinCatalogo(){

    var obj={
    
        codigoAmbiente: 2,
        codigoPuntaVenta:0,
        codigoPuntaVentaSpecified:true,
        codigoSistema:"775FA42BE90F7B78EF98F57",
        codigoSucursal:0,
        cuis:"9272DC05",
        nit:"338794023"



    }

    $.ajax({
        type:"POST",
         url:"http://localhost:5000/Sincronizacion/listaproductosservicios?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w",
         data:JSON.stringify(obj),
         cache:false,
         contentType:"application/json",
         success:function(data){
            //console.log(data)
            for(var i=0 ; i<data["listaCodigos"].length;i++){
                $("#CatProductos"). append("<tr><td>"+data["listaCodigos"][i]["codigoActividad"]+"</td><td>"+data["listaCodigos"][i]["codigoProducto"]+"</td><td>"+data["listaCodigos"][i]["descripcionProducto"]+"</td></tr>")

            }
        } })

}


function unidadesMedida(){

    var obj={
    
        codigoAmbiente: 2,
        codigoPuntaVenta:0,
        codigoPuntaVentaSpecified:true,
        codigoSistema:"775FA42BE90F7B78EF98F57",
        codigoSucursal:0,
        cuis:"9272DC05",
        nit:"338794023"



    }

    $.ajax({
        type:"POST",
         url:"http://localhost:5000/Sincronizacion/unidadmedida?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w",
         data:JSON.stringify(obj),
         cache:false,
         contentType:"application/json",
         success:function(data){
            console.log(data)
           
        } })

}

function VerProducto(id){
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
    type:"POST",
     url:"vista/producto/VerProducto.php?id="+id,
     data:obj,
     success:function(data){
        $("#content-default").html(data)
     }

    })
}