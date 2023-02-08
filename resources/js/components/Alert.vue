<template>
    <template v-if="alert !== null">
        <div v-if="alert.type === 'info'"
            class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            {{ alert.message }}
        </div>
        <div v-else-if="alert.type === 'error'"
            class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            {{ alert.message }}
        </div>
        <div v-else-if="alert.type === 'success'"
            class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            {{ alert.message }}
        </div>
    </template>
</template>


<script>
export default {
    props: ['message'],

    data() {
        return {
            alert: JSON.parse(this.message)
        }
    },
}
</script>