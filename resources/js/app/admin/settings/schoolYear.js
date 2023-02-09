import { ref } from "vue";
import AddSchoolYearModal from "./components/AddSchoolYearModal.vue";
import {
    Table,
    TableHead,
    // TableBody,
    // TableHeadCell,
    // TableRow,
    // TableCell,
} from "flowbite-vue";

export default {
    components: {
        AddSchoolYearModal,
        FbTable: Table,
    },

    setup() {
        const isAddSchoolYearModalOpen = ref(false);

        const openAddSchoolYearModal = () => {
            isAddSchoolYearModalOpen.value = true;
        };

        const closeAddSchoolYearModal = () => {
            isAddSchoolYearModalOpen.value = false;
        };

        return {
            isAddSchoolYearModalOpen,
            openAddSchoolYearModal,
            closeAddSchoolYearModal,
        };
    },
};
