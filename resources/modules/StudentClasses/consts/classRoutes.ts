import AddClass from 'resources/modules/StudentClasses/components/AddClass.vue'
import Classes from 'resources/modules/StudentClasses/components/Classes.vue'

export default [
    {
        path: "/add-class",
        component: AddClass,
        name: "AddClass",
    },
    {
        path: "/classes",
        component: Classes,
        name: "Classes",
    },
];
