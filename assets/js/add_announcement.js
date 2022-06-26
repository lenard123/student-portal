import { post } from './libs/request.js'
import { createApp, ref, computed, reactive } from './libs/vue.js'
import { useMutator, getErrorMessage } from './libs/util.js'

createApp({
    setup() {

        const { isLoading, execute, isError, error } = useMutator(
            async (data) => await post('add_announcement.php', data),
            {
                onSuccess(){ 
                    window.location.reload()
                }
            }
        )

        const errorMessages = computed(() => {
            return getErrorMessage(error.value)
        })

        const data = reactive({
            title: '',
            description: ''
        })

        const handleSubmit = () => {
            if (isLoading.value) return;
            execute(data)
        }

        return {
            data,
            handleSubmit,
            isLoading,
            isError,
            errorMessages
        }
    }
}).mount('#add-announcement-form')