<template>
    <div class="flex justify-content-center">
        <form @submit.prevent="submit">
            <div class="input-grid">
                <div><h1>Register new teacher</h1></div>
                <div>
                    <InputText placeholder="name" type="text" class="m-3" />
                </div>
                <div>
                    <InputText placeholder="name" type="text" class="m-3" />
                </div>
                <div>
                    <InputText placeholder="name" type="text" class="m-3" />
                </div>
                <Button
                    type="submit"
                    label="Save"
                    class="p-button-rounded m-3 save-btn w-9"
                />
            </div>
        </form> 
    </div>
</template>
<script setup lang="ts">
import { onMounted } from "vue";
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

const props = defineProps({
    id: {
        type: Number,
        default: 1,
    },
});
onMounted(async () => {
    getTeacherById();
});


const teacher = ref();
const getTeacherById = async () => {
    const response = await axios.get(`/api/getTeacherById/${props.id}`);
    teacher.value = response.data;
};

const submit = (event: any) => {
    const { name, surname, email, password, c_password } = Object.fromEntries(
        new FormData(event.target)
    );
    const form = { name, surname, email, password, c_password };
    register(form);
};
const router = useRouter();
const errors = ref([]);
const register = async (data: any) => {
    await axios
        .post("/api/register", data)
        .then((response) => {
            const registerResponse = response.data;
            if (registerResponse.success) {
                localStorage.setItem("token", registerResponse.data.token);
                router.push("/");
            }
        })
        .catch((e) => {
            errors.value = e.response.data.message;
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
