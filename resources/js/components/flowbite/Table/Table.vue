<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <slot></slot>
        </table>
    </div>
</template>
<script setup>
import { provide } from 'vue'
const props = defineProps({
    striped: {
        type: Boolean,
        default: false,
    },
    stripedColumns: {
        type: Boolean,
        default: false,
    },
    hoverable: {
        type: Boolean,
        default: false,
    },
})
provide('striped', props.striped)
provide('hoverable', props.hoverable)
provide('stripedColumns', props.stripedColumns)
</script>