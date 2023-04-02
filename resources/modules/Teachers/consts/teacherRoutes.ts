import Teachers from "resources/modules/Teachers/components/Teachers.vue";
import AddTeacher from "@/resources/modules/Teachers/components/AddTeacher.vue";
import EditTeacher from "@/resources/modules/Teachers/components/EditTeacher.vue";
export default [
    { path: "/teachers", component: Teachers, name: "Teachers" },
    {
        path: "/add-teacher",
        component: AddTeacher,
        name: "AddTeacher",
    },
    {
        path: "/edit-teacher/:id",
        component: EditTeacher,
        name: "EditTeacher",
        props: true,
    },
];
