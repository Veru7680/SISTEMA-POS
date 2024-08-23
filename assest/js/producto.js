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