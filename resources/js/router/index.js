import { createWebHistory, createRouter } from "vue-router";
import Home from "./../components/Home";
import Category from "./../components/Category";
import Store from "../components/Store";

const routes = [
    {
        path: "/home",
        name: "Home",
        component: Home,
    },
    {
        path: "/category",
        name: "Category",
        component: Category,
    },
    {
        path: "/",
        name: "Store",
        component: Store,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
