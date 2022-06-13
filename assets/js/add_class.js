import { createApp, ref, computed, reactive } from './libs/vue.js'
import { useMutator, getErrorMessage } from './libs/util.js'

const addClassApi = async (data) => {
    return await axios.post('add_class.php', data)
}

createApp({

    setup() {

        const { isLoading, isError, error, execute } = useMutator(addClassApi, {
            onSuccess() {
                window.location.href = BASE_URL + 'teacher/'
            }
        })

        const errorMessages = computed(() => {
            return getErrorMessage(error.value)
        })

        const data = reactive({
            name: '',
            grade: '',
            section: ''
        })

        const handleSubmit = () => {
            if (isLoading.value) return;
            execute(data)
        }

        return { data, handleSubmit, isLoading, errorMessages, isError }
    }
}).mount('#add-class-page')