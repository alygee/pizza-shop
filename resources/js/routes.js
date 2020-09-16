import Hello from "./components/Hello";
import Menu from "./components/Home";
import Profile from "./components/Dashboard";
import Register from "./components/Register.vue";
import Login from "./components/Login.vue";
import AdminDashboard from "./components/admin/Dashboard.vue";

export default [
    {
        path: "/",
        name: "menu",
        component: Menu,
        meta: {
            auth: undefined
        }
    },
    {
        path: "/hello",
        name: "hello",
        component: Hello,
        meta: {
            auth: undefined
        }
    },
    {
        path: "/register",
        name: "register",
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: "/login",
        name: "login",
        component: Login,
        meta: {
            auth: false
        }
    },
    {
        path: "/profile",
        name: "profile",
        component: Profile,
        meta: {
            auth: true
        }
    },
    {
        path: "/admin",
        name: "admin.dashboard",
        component: AdminDashboard,
        meta: {
            auth: {
                roles: 2,
                redirect: { name: "login" },
                forbiddenRedirect: "/"
            }
        }
    }
];
