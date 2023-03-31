<template>
    <div class="flex justify-content-center">
        <form @submit.prevent="submit">
            <div class="input-grid">
                <div><h1>Create new student</h1></div>
                <div v-for="input in studentForm">
                    <InputText
                        :name="input.name"
                        :type="input.type"
                        :placeholder="input.placeholder"
                        class="m-3"
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
</template>
<script setup lang="ts">
import { studentForm } from "../consts/studentForm";
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

const submit = (event: any) => {
    const { name, surname, year } = Object.fromEntries(
        new FormData(event.target)
    );
    const form = { name, surname, year };
    console.log(form);
    save(form);
};
const router = useRouter();
const save = async (data: any) => {
    await axios.post("/api/createOrUpdateStudent", data).then(() => {
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
