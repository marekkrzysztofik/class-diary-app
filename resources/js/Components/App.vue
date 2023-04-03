<template>
    <div class="flex justify-content-between align-items-center">
        <div>
            <router-link to="/teachers" class="no-decoration black-txt">
               <h1 class="m-auto">Teachers</h1></router-link>
        </div>
        <div>
            <router-link to="/classes" class="no-decoration black-txt">
               <h1 class="m-auto">Classes</h1></router-link>
        </div>
        <div>
            <router-link to="/">
                <img src="@/images/writing.png" alt="logo" class="logo"
            /></router-link>
        </div>
        <div class="">
            <PanelMenu :model="items" class="w-min siema" />
        </div>
    </div>

    <router-view />
</template>
<script setup lang="ts">
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
const items = ref([
    {
        label: "Teacher",
        icon: "pi pi-fw pi-file",
        items: [
            {
                label: "Add",
                icon: "pi pi-plus",
                command: () => {
                    router.push("/add-teacher");
                },
            },
            {
                label: "Add subject",
                icon: "pi pi-plus",
                command: () => {
                    router.push("/add-subject");
                },
            },
            {
                label: "Add student",
                icon: "pi pi-plus",
                command: () => {
                    router.push("/add-student");
                },
            },
        ],
    },
]);
</script>
<style scoped>
.siema {
    position: absolute !important;
    top: 30px;
    right: 50px;
}
</style>
