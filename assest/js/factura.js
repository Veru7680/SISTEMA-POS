function MNuevoFactura(){
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
}