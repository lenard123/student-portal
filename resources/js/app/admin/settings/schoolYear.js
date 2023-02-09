import { ref } from "vue";
import AddSchoolYearModal from "./components/AddSchoolYearModal.vue";

export default {
    components: { AddSchoolYearModal },

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
