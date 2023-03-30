import { createRouter, createWebHistory, RouteRecordRaw  } from "vue-router";
import Home from "resources/js/Components/Home.vue";
import AddTeacher from "@/resources/modules/Teachers/components/AddTeacher.vue"

const routes: Array<RouteRecordRaw> = [
    {
        path: "/",
        component: Home,
        name: "Home",
        meta: {
            requiresAuth: false,
        },
    },
    {
      path: "/add-teacher",
      component: AddTeacher,
      name: "AddTeacher",
  },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

// router.beforeEach((to, from) => {
//     if (to.meta.requiresAuth && !localStorage.getItem("token")) {
//         return { name: "Login" };
//     }
//     if (to.meta.requiresAuth == false && localStorage.getItem("token")) {
//         return { name: "/" };
//     }
// });

export default router;
