import { createRouter, createWebHistory, RouteRecordRaw  } from "vue-router";
import Home from "resources/js/Components/Home.vue";

import teacherRoutes from '@/resources/modules/Teachers/consts/teacherRoutes'
import studentRoutes from 'resources/modules/Students/consts/studentRoutes'
import classRoutes from 'resources/modules/StudentClasses/consts/classRoutes'
import activityRoutes from 'resources/modules/Activities/consts/activityRoutes'
import subjectRoutes from 'resources/modules/Subjects/consts/subjectRoutes'

const routes: Array<RouteRecordRaw> = [
    {
        path: "/",
        component: Home,
        name: "Home",
        meta: {
            requiresAuth: false,
        },
    },
...subjectRoutes,
...activityRoutes,
...classRoutes,
...studentRoutes,
...teacherRoutes
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
