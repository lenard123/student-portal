import { ref, computed } from "vue";

export default {
    setup() {
        const searchField = ref("student_id");
        const searchValue = ref("");

        const statusFilter = ref("all");
        const gradeFilter = ref("all");

        const headers = [
            {
                text: "Student Id",
                value: "student_id",
            },
            {
                text: "Last Name",
                value: "user.lastname",
                sortable: true,
            },
            {
                text: "Firstname",
                value: "user.firstname",
                sortable: true,
            },
            {
                text: "Status",
                value: "status",
            },
            {
                text: "Grade",
                value: "grade",
            },
            {
                text: "Section",
                value: "section",
            },
            {
                text: "",
                value: "action",
            },
        ];

        const filterOptions = computed(() => {
            const result = [];

            if (
                statusFilter.value === "enrolled" ||
                gradeFilter.value !== "all"
            ) {
                result.push({
                    field: "currentSection",
                    comparison: "!=",
                    criteria: null,
                });
            }

            if (statusFilter.value === "not_enrolled") {
                result.push({
                    field: "currentSection",
                    comparison: "=",
                    criteria: null,
                });
            }

            if (gradeFilter.value !== "all") {
                result.push({
                    field: "currentSection.grade_level_id",
                    comparison: "=",
                    criteria: parseInt(gradeFilter.value),
                });
            }

            return result;
        });

        const items = window.students;

        return {
            headers,
            items,
            searchField,
            searchValue,
            filterOptions,
            statusFilter,
            gradeFilter,
        };
    },
};
