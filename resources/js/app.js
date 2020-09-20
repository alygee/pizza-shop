/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import Vue from "vue";
import VueRouter from "vue-router";
import VueAuth from "@websanova/vue-auth";
import VueAxios from "vue-axios";
import VTooltip from "v-tooltip";
import VueToastr from "vue-toastr";
import Vuex from "vuex";
import axios from "axios";
import auth from "./auth";
import routes from "./routes";
import App from "./components/App";
import storeData from "./store/index.js";

Vue.use(VueRouter);
const router = new VueRouter({ history: true, mode: "history", routes });
Vue.router = router;

Vue.use(Vuex);
Vue.use(VueAxios, axios);
Vue.use(VueAuth, auth);
Vue.use(VTooltip);
Vue.use(VueToastr, {
    defaultTimeout: 3000,
    defaultProgressBar: false,
    defaultStyle: {
        "background-color": "#e5e7eb",
        color: "#374151",
        "font-weight": "600"
    }
});

const store = new Vuex.Store(storeData);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    components: { App },
    router,
    store
});
