document.getElementById('form8').addEventListener('submit',Fsubmit);

function Fsubmit(event){
    event.preventDefault();
    //alert('Gracias por tu comentario');
    var id_comentario_usuario=document.getElementById('id_cometario');
    var mymodal = document.getElementById('myModal');
    if(id_comentario_usuario.value==''){
        alert('El campo no puede estar vacio');
        
    }
}