import { computed, inject } from "vue";
import classNames from "classnames";

const baseClasses = "px-6 py-3 text-xs uppercase";
const stripedHeadCellClasses =
    "even:bg-white even:dark:bg-gray-900 odd:dark:bg-gray-800 odd:bg-gray-50";

export function useTableHeadCellClasses() {
    const isColumnsStriped = inject("stripedColumns");

    const tableHeadCellClasses = computed(() => {
        return classNames(baseClasses, {
            [stripedHeadCellClasses]: isColumnsStriped,
        });
    });

    return {
        tableHeadCellClasses,
    };
}
