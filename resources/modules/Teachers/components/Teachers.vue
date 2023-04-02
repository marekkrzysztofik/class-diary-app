<template>
    <div class="side-box">
        <router-link to="/add-teacher" class="no-decoration"
            ><Button class="add-button" icon="pi pi-plus" label="Add Teacher"
        /></router-link>
        <div v-for="teacher in teachers">
            <p>{{ teacher.name }} {{ teacher.surname }}</p>
            <button
                @click="editTeacher(teacher.id)"
                class="btn-icon btn-icon-users"
            >
                <i class="pi pi-stopwatch"></i>
            </button>
        </div>
    </div>
</template>
<script setup lang="ts">
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import { useGetTeachers } from "resources/modules/Teachers/composables/useGetTeachers";
const { getTeachers, teachers } = useGetTeachers();
const router = useRouter();
onMounted(async () => {
    getTeachers();
    console.log(teachers);
});
const editTeacher = (id: any) => {
    router.push(`/edit-teacher/${id}`);
};
</script>
