import { computed, inject } from "vue";
import classNames from "classnames";

const baseClasses =
    "bg-white dark:bg-gray-800 [&:not(:last-child)]:border-b [&:not(:last-child)]:dark:border-gray-700";
const stripedClasses =
    "odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700";
const hoverableClasses = "hover:bg-gray-50 dark:hover:bg-gray-600";

export function useTableRowClasses() {
    const isStriped = inject("striped");
    const isHoverable = inject("hoverable");

    console.log({ isStriped, isHoverable });

    const tableRowClasses = computed(() => {
        return classNames(baseClasses, {
            [stripedClasses]: isStriped,
            [hoverableClasses]: isHoverable,
        });
    });

    return {
        tableRowClasses,
    };
}
