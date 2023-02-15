import { ref, onMounted } from "vue";

export default {
    setup() {
        const body = ref();

        onMounted(() => {
            body.value.scrollTop = body.value.scrollHeight;
        });

        return {
            body,
        };
    },
};
