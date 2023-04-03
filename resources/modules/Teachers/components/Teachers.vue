<template>
    <div class="flex">
        <div class="side-box">
            <router-link to="/add-teacher" class="no-decoration"
                ><Button
                    class="add-button"
                    icon="pi pi-plus"
                    label="Add Teacher"
            /></router-link>
            <div v-for="teacher in teachers">
                <p @click="editTeacher(teacher.id)" class="bold">
                    {{ teacher.name }} {{ teacher.surname }}
                </p>
            </div>
        </div>
        <div class="m-0-15">
            <form @submit.prevent="submit">
                <div class="input-grid">
                    <div><h1>Edit teacher</h1></div>
                    <div class="center">
                        <InputText
                            name="name"
                            placeholder="Name"
                            type="text"
                            class="m-3"
                            :value="teacher.name"
                        />
                    </div>
                    <div>
                        <InputText
                            name="surname"
                            placeholder="Surname"
                            type="text"
                            class="m-3"
                            :value="teacher.surname"
                        />
                    </div>
                    <div>
                        <InputText
                            name="email"
                            placeholder="Email"
                            type="text"
                            class="m-3"
                            :value="teacher.email"
                        />
                    </div>
                    <Button
                        type="submit"
                        label="Save"
                        class="p-button-rounded m-3 save-btn w-9"
                    />
                </div>
            </form>
        </div>
    </div>
</template>
<script setup lang="ts">
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import { useGetTeachers } from "resources/modules/Teachers/composables/useGetTeachers";
import axios from "axios";
import { Teacher } from "resources/types/teachers";

const { getTeachers, teachers } = useGetTeachers();
const router = useRouter();
const teacher = ref<Teacher>({
    id: "",
    name: "",
    surname: "",
    email: "",
});

onMounted(async () => {
    getTeachers();
    getTeacherById();
});
const getTeacherById = async (id: number = 1) => {
    const response = await axios.get(`/api/getTeacherById/${id}`);
    teacher.value = response.data;
    console.log(teacher.value);
};
const editTeacher = (id: number) => {
    getTeacherById(id);
};
const submit = (event: any) => {
    const id: number = teacher.value.id;
    const { name, surname, email } = Object.fromEntries(
        new FormData(event.target)
    );
    const form = { id, name, surname, email };
    console.log(form);
    save(form);
};
const save = async (data: any) => {
    await axios.post("/api/registerOrUpdateTeacher", data).then(() => {
        router.push("/");
    });
};
</script>
<style scoped>
.input-grid {
    margin: auto;
    display: grid;
    align-items: center;
    grid-template-columns: repeat(2, 250px);
    grid-template-rows: 1fr;
    grid-column-gap: 0px;
    grid-row-gap: 0px;
}
</style>
