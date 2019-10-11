window.onload = function () {

    const server = new Server();

    document.getElementById('turn').addEventListener('click', async function () {
        console.log(await server.turn(1, 2, 4));
    });

    document.getElementById('loginButton')
    .addEventListener('click', async function() {
        const login = document.getElementById('login').value;
        const password = document.getElementById('password').value;
        if (login && password) {
            console.log(await server.auth(login, password));
        } else {
            alert('Введите логин или пароль!!!');
        }
    });
};