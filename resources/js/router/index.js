import { createWebHistory, createRouter } from "vue-router";
import Home from "./../components/Home";
import Category from "./../components/Category";
import Store from "../components/Store";
import Login from "../components/Auth/Login";
import Register from "../components/Auth/Register";

const routes = [
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/category",
        name: "Category",
        component: Category,
    },
    {
        path: "/Store",
        name: "Store",
        component: Store,
    },
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/register",
        name: "Register",
        component: Register,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
