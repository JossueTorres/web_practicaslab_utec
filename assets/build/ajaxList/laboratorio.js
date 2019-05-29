document.querySelector('#guardar').addEventListener('click', getSeminarios());

function getSeminarios() {
    console.log("ingreso a funcion");

    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'http://localhost/practicaslab_utec/apis/admin/Laboratorio_api/listLaboratorios', true);
    xhttp.send();
    xhttp.onreadystatechange=function() {

        if(this.readyState==4 && this.status ==200){
            //console.log(this.responseText);

            let datos =JSON.parse(this.responseText);
            console.log(datos);
            let resp = document.querySelector('#resp');
            resp.innerHTML='';

            for(let item of datos){
                // console.log(item.nombre);
                resp.innerHTML+= `
            
                <tr>
                <td>${item.lab_codigo}</td>
                <td>${item.lab_nombre}</td>
                <td>${item.lab_acronimo}</td>
                <td>
                <div class="botonesList">
      
                  <button class="btn btn-sm btn-warning" type="button" data-toggle="modal" data-target="#modal-edificio" >Editar <span class="fa fa-pencil"></span></button> 
                  <button class="btn btn-sm btn-danger" type="button">Eliminar <span class="fa fa-remove"></span></button> 
                </div>              
                </td>
            </tr>
                
                `
            }
        }
    }
}