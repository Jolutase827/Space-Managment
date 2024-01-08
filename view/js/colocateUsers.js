const userContainer = document.getElementById('user-container');
let allUsers;
fetch('https://localhost/Space Managment/servicioUsuarios/service.php')
.then(response=>response.json())
.then(data=>{
    allUsers = data;
})
.catch(error=> console.error(error))
.finally(()=>{
    let container;
    let name;
    let containerOptions;
    let read;
    let edit;
    let deleter;
    allUsers.forEach(user => {
        container = document.createElement('div');
        name = document.createElement('h4');
        containerOptions = document.createElement('div');
        read = document.createElement('i');
        edit = document.createElement('i');
        deleter = document.createElement('i');
        container.classList= 'usuario col-11 d-flex justify-content-between p-2 justify-content-center rounded mb-1';
        name.classList = 'col-8 mt-1 ms-4';
        name.textContent = user.nombreUsuario;
        containerOptions.classList = 'col-1 d-flex justify-content-between me-5 mt-1';
        read.classList = 'bi bi-file-text';
        edit.classList = 'bi bi-pen';
        deleter.classList = 'bi bi-trash3-fill';
        containerOptions.append(read);
        containerOptions.append(edit);
        containerOptions.append(deleter);
        container.append(name);
        container.append(containerOptions);
        userContainer.append(container);
    });
});
