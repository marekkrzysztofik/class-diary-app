import { Ref, ref } from "vue";
import { Class } from "../../types/class";
import axios from "axios";

export function useClasses() {
    const classes: Ref<Array<Class>> = ref([]);
    async function getClasses() {
        const response = await axios.get(`/api/getClasses`);
        classes.value = response.data;
    }
    return { getClasses, classes };
}
