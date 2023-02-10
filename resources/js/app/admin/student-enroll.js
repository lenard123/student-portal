import { ref, computed } from "vue";

export default {
    setup() {
        const { grade_levels } = window;

        const selectedLevel = ref(null);
        const selectedSection = ref(null);

        const sections = computed(() => {
            return (
                grade_levels.find((level) => level.id == selectedLevel.value)
                    ?.sections || []
            );
        });

        const subjects = computed(() => {
            return (
                sections.find((section) => section.id == selectedSection.value)
                    ?.subjects || []
            );
        });

        return {
            subjects,
            selectedSection,
            sections,
            selectedLevel,
            grade_levels,
        };
    },
};
