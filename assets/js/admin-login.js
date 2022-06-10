import { createApp, ref, computed } from './vue.js'
import useMutator from './useMutator.js'
import { adminLoginApi } from './api.js'
import { getErrorMessage } from './util.js'

const App = createApp({
    setup() {

        const { isLoading, execute, isError, data, error } = useMutator(adminLoginApi)

        const email = ref('')
        const password = ref('')
        const errorMessage = computed(() => {
            return getErrorMessage(error.value)
        })

        const login = () => {
            if (isLoading) execute({ email: email.value, password: password.value })
        }

        return {
            email,
            password,
            isLoading,
            login,
            errorMessage,
            isError
        }
    }
})

App.mount('#admin-login-page')