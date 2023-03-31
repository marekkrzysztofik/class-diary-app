import { Column } from "../../../types/formColumns";

export const teacherForm: Column[] = [
    { name: "name", type: "text", placeholder: "Name" },
    { name: "surname", type: "text", placeholder: "Surname" },
    { name: "email", type: "email", placeholder: "E-mail" },
    { name: "password", type: "password", placeholder: "Password" },
    { name: "c_password", type: "password", placeholder: "Confirm Password" },
];
