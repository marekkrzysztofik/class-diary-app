<template>
    <div class="flex m-3">
        <PanelMenu :model="items" class="w-min" />
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
                label: "Export",
                icon: "pi pi-fw pi-external-link",
            },
        ],
    },
]);
</script>
