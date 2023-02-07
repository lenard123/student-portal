import './bootstrap';
import { createApp } from 'vue';
import login from './pages/login';
import register from './pages/register';

window.addEventListener('load', () => {
    const bodyID = document.body.id

    switch(bodyID) {
        case 'login_page': 
            createApp(login).mount(`#${bodyID}`)
            break;
        case 'register_page':
            createApp(register).mount(`#${bodyID}`)
            break;
    }

})