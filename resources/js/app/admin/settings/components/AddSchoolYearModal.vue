<script setup>
import { Modal, Input, Button } from 'flowbite-vue'
import { defineProps, defineEmits } from 'vue'
import { getCsrfToken } from "@/utils.js"

const emit = defineEmits(['closeAddSchoolYearModal'])
const props = defineProps(['isOpen', 'closeModal'])

const closeModal = () => {
    props.closeModal()
}

</script>

<template>
    <Modal size="sm" v-if="props.isOpen" @close="closeModal">
        <template #header>
            <div class="flex items-center text-lg">
                Add new School Year
            </div>
        </template>
        <template #body>
            <form method="POST" action="/admin/settings/school-year">
                <input type="hidden" name="_token" :value="getCsrfToken()" />
                <Input name="school_year" label="School Year" />
                <div class="mt-4 flex justify-end">
                    <Button>Create</Button>
                </div>
            </form>
        </template>
    </Modal>
</template>

