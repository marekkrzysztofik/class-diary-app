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
                            placeholder="Name"
                            type="text"
                            class="m-3"
                            :value="teacher.name"
                        />
                    </div>
                    <div>
                        <InputText
                            placeholder="Surname"
                            type="text"
                            class="m-3"
                            :value="teacher.surname"
                        />
                    </div>
                    <div>
                        <InputText
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
const { getTeachers, teachers } = useGetTeachers();
const router = useRouter();
const teacher = ref({
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
    const { name, surname, email, password, c_password } = Object.fromEntries(
        new FormData(event.target)
    );
    const form = { name, surname, email, password, c_password };
    register(form);
};
const register = async (data: any) => {
    await axios.post("/api/register", data).then((response) => {
        const registerResponse = response.data;
        if (registerResponse.success) {
            localStorage.setItem("token", registerResponse.data.token);
            router.push("/");
        }
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
