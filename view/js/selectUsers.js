const radio = document.getElementById('radio');
let seleccionado = false;
const selecionarYDeseleccionar = ()=>{
    if(seleccionado){
        radio.checked = false;
        seleccionado = false;
    }else{
        radio.checked = true;
        seleccionado = true;
    }
};
radio.addEventListener('click',selecionarYDeseleccionar);
