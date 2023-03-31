import { createRouter, createWebHistory, RouteRecordRaw  } from "vue-router";
import Home from "resources/js/Components/Home.vue";
import AddTeacher from "@/resources/modules/Teachers/components/AddTeacher.vue"
import AddClass from 'resources/modules/StudentClasses/components/AddClass.vue'
import AddSubject from 'resources/modules/Subjects/components/AddSubject.vue'
import AddActivity from 'resources/modules/Activities/components/AddActivity.vue'
import AddStudent from 'resources/modules/Students/components/AddStudent.vue'

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
  {
    path: "/add-class",
    component: AddClass,
    name: "AddClass",
},
{
    path: "/add-subject",
    component: AddSubject,
    name: "AddSubject",
},
{
    path: "/add-activity",
    component: AddActivity,
    name: "AddActivity",
},
{
    path: "/add-student",
    component: AddStudent,
    name: "AddStudent",
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
