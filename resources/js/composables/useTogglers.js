import { isNull } from "lodash";
import { reactive } from "vue";

export const useTogglers = () => {
    const togglers = reactive({});

    const isOpen = (key, _default = false) => {
        if (key in togglers) return togglers[key];

        togglers[key] = _default;

        return _default;
    };

    const toggle = (key, _set = null) => {
        if (!isNull(_set)) {
            togglers[key] = _set;
            return;
        }

        togglers[key] = !isOpen(key);
    };

    return {
        isOpen,
        toggle,
    };
};
