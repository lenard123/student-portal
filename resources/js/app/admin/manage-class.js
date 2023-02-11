import { reactive } from "vue";

export default {
    setup() {
        const selected = reactive(null);

        const select = () => {};

        return {
            selected,
        };
    },
};
