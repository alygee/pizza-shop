import MenuGrid from "./components/menu/MenuGrid";
import Profile from "./components/Dashboard";
import Register from "./components/Register.vue";
import Login from "./components/Login.vue";
import AdminDashboard from "./components/admin/Dashboard.vue";
import Checkout from "./components/checkout/Checkout.vue";
import OrderItems from "./components/OrderItems.vue";
import ThankYou from "./components/Thanks.vue";

export default [
    {
        path: "/",
        name: "menu",
        component: MenuGrid,
        meta: {
            auth: undefined
        }
    },
    {
        path: "/checkout",
        name: "checkout",
        component: Checkout,
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
            auth: {
                roles: 1,
                redirect: { name: "login" },
                forbiddenRedirect: "/"
            }
        }
    },
    {
        path: "/items/:id",
        name: "order.items",
        component: OrderItems,
        // meta: {
        //     auth: {
        //         roles: 1,
        //         redirect: { name: "login" },
        //         forbiddenRedirect: "/"
        //     }
        // }
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
    },
    {
        path: "/thank-you/:id",
        name: "thanks",
        component: ThankYou,
        meta: {
            auth: undefined
        }
    }
];
