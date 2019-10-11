class Server {

    async send(method, data) {
        const arr = [];
        for (let key in data) {
            arr.push(`${key}=${data[key]}`);
        }
        const response = await fetch(`api/?method=${method}&${arr.join('&')}`);
        const answer = await response.json();
        if (answer && answer.result === 'ok') {
            return answer.data;
        }
        // показать сообщение об ошибке
        //...
        return false;
    }

    auth(login, password) {
        return this.send('login', { login, password });
    }

    turn(id, x, y) {
        return this.send('turn', { id, x, y });
    }
}