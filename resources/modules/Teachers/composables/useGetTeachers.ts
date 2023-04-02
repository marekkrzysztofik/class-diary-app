import { Ref, ref } from "vue";
import { Teacher } from "resources/types/teachers";
import axios from "axios";

export function useGetTeachers() {
    const teachers: Ref<Array<Teacher>> = ref([]);
    async function getTeachers() {
        const response = await axios.get(`/api/getTeachers`);
        teachers.value = response.data;
    }
    return { getTeachers, teachers };
}
