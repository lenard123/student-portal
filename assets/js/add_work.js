import { post } from './libs/request.js'
import { createApp, ref, computed, reactive } from './libs/vue.js'
import { useMutator, getErrorMessage } from './libs/util.js'

createApp({
    setup() {

        const data = reactive({
            title: null,
            instruction: null,
            deadline: null,
        })

        const fileCount = ref(0)
        const fileInput = ref()
        const submitBtn = ref()

        const handleFileChange = (e) => {
            fileCount.value = e.target.files.length
        }

        const handleClear = (e) => {
            e.preventDefault()
            fileInput.value.value = ''
            fileCount.value = 0
        }

        const handleSubmit = (e) => {
            e.preventDefault()
            const formData = new FormData()
            formData.append('title', data.title)
            formData.append('instruction', data.instruction)
            formData.append('deadline', data.deadline)
            console.log(data.deadline)
        }

        return {
            handleFileChange,
            handleClear,
            handleSubmit,
            fileInput,
            fileCount,
            submitBtn,
            data,
        }
    }
}).mount('#create-work-page')