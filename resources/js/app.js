import "./bootstrap";
import { createApp } from "vue";
import Alert from "./components/Alert.vue";
import passwordToggler from "./app/passwordToggler";
import studentSidebar from "./app/studentSidebar";

const vueApps = { passwordToggler, studentSidebar };

window.addEventListener("load", () => {
    const apps = document.querySelectorAll("[data-app]");
    apps.forEach((app) => {
        const appName = app.dataset.app;
        if (vueApps[appName]) {
            createApp(vueApps[appName]).component("Alert", Alert).mount(app);
        }
    });
});
