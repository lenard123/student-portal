import { ref, computed } from "vue";

export default {
    setup() {
        const { grade_levels } = window;

        const selectedLevel = ref(
            window.current_section?.grade_level_id || null
        );
        const selectedSection = ref(window.current_section?.id || "");

        const sections = computed(() => {
            return (
                grade_levels.find((level) => level.id == selectedLevel.value)
                    ?.sections || []
            );
        });

        const courses = computed(() => {
            return (
                sections.value.find(
                    (section) => section.id == selectedSection.value
                )?.courses || []
            );
        });

        return {
            courses,
            selectedSection,
            sections,
            selectedLevel,
            grade_levels,
        };
    },
};
