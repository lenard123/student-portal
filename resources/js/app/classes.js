import { ref } from "vue";
import { Tabs, Tab } from "flowbite-vue";

export default {
    components: { Tabs, Tab },

    setup() {
        const activeTab = ref("lesson");
        const postLesson = ref(false);

        return {
            activeTab,
            postLesson,
        };
    },
};
