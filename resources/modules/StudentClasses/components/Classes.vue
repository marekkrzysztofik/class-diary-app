<template>
    <div class="flex">
        <div class="side-box">
            <router-link to="/add-class" class="no-decoration"
                ><Button
                    class="add-button"
                    icon="pi pi-plus"
                    label="Add Class"
            /></router-link>
            <div v-for="item in classes">
                <p class="bold">{{ item.year }} {{ item.name }}</p>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import { useClasses } from "resources/utils/components/useStudentClasses";

const { getClasses, classes } = useClasses();
const router = useRouter();

onMounted(async () => {
    getClasses();
});

const editTeacher = (id: number) => {
    //getTeacherById(id);
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
