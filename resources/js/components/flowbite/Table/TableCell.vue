<template>
    <td :class="tableCellClasses">
        <slot></slot>
    </td>
</template>
<script setup>
import { useTableCellClasses } from './composables/useTableCellClasses';
const { tableCellClasses } = useTableCellClasses()

</script>