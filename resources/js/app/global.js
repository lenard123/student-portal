import { useTogglers } from "@/composables/useTogglers";

export default {
    setup() {
        const { isOpen, toggle } = useTogglers();

        return { isOpen, toggle };
    },
};
