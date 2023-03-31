<template>
  <div class="flex flex-column center">
      <h2 class="m-0">Sign student to class</h2>
      <DataTable
          :value="classes"
          v-model:selection="selectedClass"
          selectionMode="single"
          dataKey="id"
          responsiveLayout="scroll"
          :scrollable="true"
          scrollHeight="400px"
          class="w-min"
      >
          <template #header>Classes </template>
          <Column
              v-for="column in classColumns"
              :key="column.field"
              :field="column.field"
              :header="column.header"
          ></Column>
      </DataTable>
  </div>
</template>
<script setup lang="ts">
import { useRouter } from "vue-router";
import { onMounted, ref } from "vue";
import { useClasses } from "../../../utils/components/useStudentClasses";
import { classColumns } from "../../../utils/consts/classColumns";

const { getClasses, classes } = useClasses();

const router = useRouter();
onMounted(async () => {
  getClasses();
  console.log(classes);
});

const selectedClass = ref();
</script>
