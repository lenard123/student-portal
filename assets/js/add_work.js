import { post } from './libs/request.js'
import { createApp, ref, computed, reactive } from './libs/vue.js'
import { useMutator, getErrorMessage } from './libs/util.js'

const addWorkApi = async(data) => {
    return await post('add_work.php' + window.location.search, data)
}

const errorModal = createApp({
    setup() {

        const errorMessages = ref()

        const showError = (e) => {
            errorMessages.value = e
            document.getElementById('create-work-error').checked = true
        }

        return {
            showError,
            errorMessages
        }
    }
}).mount('#create-work-error-modal')

createApp({
    setup() {

        const { isLoading, isError, execute, errorMessages } = useMutator(addWorkApi, {
            onSuccess() {
                alert('Success')
                window.location.reload()
            },
            onError() {
                errorModal.showError(errorMessages.value)
            }
        })

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
            if (isLoading.value) return;

            const formData = new FormData()
            const files = fileInput.value.files;
            formData.append('title', data.title)
            formData.append('instruction', data.instruction)
            formData.append('deadline', data.deadline)
            for(let i = 0; i < files.length; i++) {
                formData.append(`attachments[${i}]`, files.item(i))
            }
            execute(formData)
        }

        return {
            handleFileChange,
            handleClear,
            handleSubmit,
            fileInput,
            fileCount,
            submitBtn,
            data,
            isLoading,
            isError
        }
    }
}).mount('#create-work-page')