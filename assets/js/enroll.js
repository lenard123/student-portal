import { post } from './libs/request.js'
import { createApp, ref, computed, reactive } from './libs/vue.js'
import { useMutator, getErrorMessage, redirect } from './libs/util.js'

const enrollApi = async (code) => {
    return await post('enroll.php', { code })
}

createApp({

    setup() {

        const code = ref('')

        const { isLoading, isError, error, execute } = useMutator(enrollApi, {
            onSuccess() {
                redirect(`student/class.php?code=${code.value}`)
            }
        })

        const errorMessages = computed(() => {
            return getErrorMessage(error.value)
        })

        const handleSubmit = (e) => {
            if (isLoading.value) return;
            execute(code.value)
        }

        return {
            isLoading,
            handleSubmit,
            isError,
            errorMessages,
            code
        }
    }
}).mount('#class-enroll-form')