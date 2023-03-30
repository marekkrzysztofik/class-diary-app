import "./bootstrap";

import { createApp } from "vue";

import router from "./router";

import App from "resources/js/Components/App.vue";

import PrimeVue from "primevue/config";

import "primevue/resources/primevue.min.css";
import "primeflex/primeflex.css";
import "primevue/resources/themes/saga-blue/theme.css"; //theme

import "primeicons/primeicons.css"; //icons
import InputText from "primevue/inputtext";
import PanelMenu from "primevue/panelmenu";
import AddTeacher from "resources/modules/Teachers/components/AddTeacher.vue";
import Button from "primevue/button";
const app = createApp(App);
app.use(router);
app.use(PrimeVue);
app.component("PanelMenu", PanelMenu);
app.component("AddTeacher", AddTeacher);
app.component("InputText", InputText);
app.component("Button", Button);
app.mount("#app");
