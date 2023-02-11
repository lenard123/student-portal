import { ref, computed } from "vue";

export default {
    setup() {
        const { grade_levels } = window;

        const selectedLevel = ref(window.current_section?.grade_level_id);
        const selectedSection = ref(window.current_section?.id);

        const sections = computed(() => {
            return (
                grade_levels.find((level) => level.id == selectedLevel.value)
                    ?.sections || []
            );
        });

        const subjects = computed(() => {
            return (
                sections.value.find(
                    (section) => section.id == selectedSection.value
                )?.subjects || []
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
