import "./bootstrap";
import { createApp } from "vue";
import Alert from "./components/Alert.vue";
import { Button } from "flowbite-vue";
import passwordToggler from "./app/passwordToggler";
import studentSidebar from "./app/studentSidebar";
import changeDepartment from "./app/changeDepartment";
import adminSettingsSchoolYear from './app/admin/settings/schoolYear'
import global from "./app/global";

const vueApps = { 
    passwordToggler, 
    studentSidebar, 
    changeDepartment, 
    global,
    adminSettingsSchoolYear 
};
const components = { Alert, FbButton: Button };

window.addEventListener("load", () => {
    const apps = document.querySelectorAll("[data-app]");
    apps.forEach((app) => {
        const appName = app.dataset.app;
        if (vueApps[appName]) {
            vueApps[appName].components = {
                ...components,
                ...vueApps[appName].components,
            };
            createApp(vueApps[appName]).mount(app);
        }
    });
});
