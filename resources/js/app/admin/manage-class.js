import { ref } from "vue";

export default {
    setup() {
        const selected = ref(null);

        console.log(selected);

        const select = (item) => {
            console.log(item);
            selected.value = item;
        };

        return {
            selected,
            select,
        };
    },
};
