<template>
    <div class="flex justify-content-center">
        <form @submit.prevent="submit">
            <div class="input-grid">
                <div><h1>Create new class</h1></div>
                <div v-for="input in classForm">
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
import { classForm } from "../consts/classForm";
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";

const submit = (event: any) => {
    const { year, name, quantity } = Object.fromEntries(
        new FormData(event.target)
    );
    const form = { year, name, quantity };
    console.log(form)
    save(form);
};
const router = useRouter();
const save = async (data: any) => {
    await axios
        .post("/api/createOrUpdateClass", data)
        .then(() => {
                router.push("/");
        })
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
