<template>
    <th scope="col" :class="tableHeadCellClasses">
        <slot></slot>
    </th>
</template>
<script setup>
import { useTableHeadCellClasses } from './composables/useTableHeadCellClasses';

const { tableHeadCellClasses } = useTableHeadCellClasses()
</script>