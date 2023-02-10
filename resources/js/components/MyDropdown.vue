<template>
    <div class="relative">
        <div class="flex items-center cursor-pointer" @click="toggle()">
            <slot name="label"></slot>
        </div>

        <div v-if="isOpen"
            class="absolute mt-1 right-1 top-full min-w-max shadow-lg rounded transition delay-75 ease-in-out z-10">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue'

export default {
    props: ['id'],

    setup() {
        const isOpen = ref(false)

        const toggle = () => {
            isOpen.value = !isOpen.value
        }

        return { isOpen, toggle }
    }
}
</script>
