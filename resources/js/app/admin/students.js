import { ref } from "vue";

export default {
    setup() {
        const searchField = ref("student_id");
        const searchValue = ref("");

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
        ];

        const items = window.students;

        return {
            headers,
            items,
            searchField,
            searchValue,
        };
    },
};
