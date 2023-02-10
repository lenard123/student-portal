import "./bootstrap";
import { createApp } from "vue";
import passwordToggler from "./app/passwordToggler";
import studentSidebar from "./app/studentSidebar";
import adminSettingsSchoolYear from "./app/admin/settings/schoolYear";
import global from "./app/global";
import * as components from "./components/index";
import student from "./app/admin/students";
import studentEnroll from "./app/admin/student-enroll";

const vueApps = {
    passwordToggler,
    studentSidebar,
    global,
    adminSettingsSchoolYear,
    student,
    studentEnroll,
};

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
