const buttonAddUser = document.getElementById('addUser');
const buttonCreatePassword= document.getElementById('generate-pwd');
const inputUserName = document.getElementById('input-user-name');
const inputName = document.getElementById('input-name');
const inputLastName = document.getElementById('input-last-name');
const inputPassword = document.getElementById('input-password');
const inputEmail = document.getElementById('input-email');
const goBack = document.getElementById('go-back');
const containerOfMessage = document.getElementById('container-messaje');
const caracteresPosibles= ['0123456789','ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz','@$%€"/:.-_'];
function isAllFieldsWhithText(){
    if(inputEmail.value===''||inputName.value===''||inputLastName.value===''||inputUserName.value===''||inputPassword.value===''){
        return false;
    }
    return true;
}
buttonCreatePassword.addEventListener('click',()=>{
   let pwd = '';
   let arrayPart;
   for(let i=0; i<12;i++){
        arrayPart = parseInt(Math.random()*4);
        pwd += caracteresPosibles[arrayPart].charAt(parseInt(Math.random()*(caracteresPosibles[arrayPart].length)));
   }
   inputPassword.value = pwd;
});
goBack.addEventListener('click',()=>{
    location.replace('rootInterface.php');
});
buttonAddUser.addEventListener('click',()=>{
    if(isAllFieldsWhithText()){
        const options= {
            method: 'POST',
            headers:{
                'Content-Type': 'aplication/json',
            },
            body: JSON.stringify({"nombreUsuario": inputName.value,"nombre":inputName.value,"apellido":inputLastName.value,"password":inputPassword.value, "email": inputEmail.value })
        };
        fetch('http://localhost/Space Managment/servicioUsuarios/service.php',options)
        .then(response => response.json())
        .then(data=> {
            if(data!=null){
                containerOfMessage.innerHTML = `<div class=' d-flex align-items-center justify-content-center rounded p-3 good-message'>
                    <stong>The user has been create succsessfully <a href="mailto:${inputEmail.value}?subject=You are registred in Space Manager&body=This is your user name: '${inputUserName.value}'. And this is your password: '${inputPassword.value}' "> send email</a></stong>
                </div>`;
                inputEmail.value ='';
                inputLastName.value ='';
                inputName.value ='';
                inputUserName.value ='';
                inputPassword.value='';
            }else{
                containerOfMessage.innerHTML = `<div class=' d-flex align-items-center justify-content-center rounded p-3 error-message'>
                    <stong>Email or user name already exists</stong>
                </div>`;
            }
            
        })
        .catch(error=>console.error(error));
        
    }else{
        containerOfMessage.innerHTML = `<div class=' d-flex align-items-center justify-content-center rounded     p-3 error-message'>
            <stong>Please complete all the fields</stong>
            </div>`;
    }
});
