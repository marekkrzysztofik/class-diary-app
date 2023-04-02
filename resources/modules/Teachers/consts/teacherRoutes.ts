import Teachers from "resources/modules/Teachers/components/Teachers.vue";
import AddTeacher from "@/resources/modules/Teachers/components/AddTeacher.vue";
export default [
    { path: "/teachers", component: Teachers, name: "Teachers" },
    {
        path: "/add-teacher",
        component: AddTeacher,
        name: "AddTeacher",
    },
];
