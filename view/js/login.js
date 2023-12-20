const boton = document.getElementById('button-enter');
const nombre = document.getElementById('name');
const pwd = document.getElementById('pwd');
const error = document.getElementById('error');

boton.addEventListener('click',()=>{
    if(nombre.value!=''&&pwd.value!=''){
        fetch(`https://localhost/Space-Managment/servicioUsuarios/service.php?nombre=${nombre.value}&pwd=${pwd.value}`)
        .then(response=> response.json())
        .then(data=>{
            if(data!=null){
                console.log(data);
                if(data.admin){

                }
            }else{
                error.innerHTML = `<div class="alert alert-danger text-center col-4 mt-3" role="alert">
                                        The user name or the password are wrong
                                    </div>`;
            }
        })
        .catch(error=> console.log('error'))
    }else{
        error.innerHTML = `<div class="alert alert-danger text-center col-4 mt-3" role="alert">
                                        Please, complete all the fieldes
                                    </div>`;
    }
});