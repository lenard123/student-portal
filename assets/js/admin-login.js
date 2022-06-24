import { createApp, ref, computed } from './libs/vue.js'
import useMutator from './libs/useMutator.js'
import { getErrorMessage } from './libs/util.js'
import { post } from './libs/request.js'


export const adminLoginApi = async (data) => {
    return await post('authenticate_admin.php', data)
}

const onSuccess = () => {
    window.location.href = BASE_URL + 'admin/index.php';
}

const App = createApp({
    setup() {

        const { isLoading, execute, isError, data, error } = useMutator(adminLoginApi, {onSuccess})

        const email = ref('')
        const password = ref('')
        const errorMessages = computed(() => {
            return getErrorMessage(error.value)
        })

        const login = () => {
            if (isLoading.value) 
                return;

            execute({ email: email.value, password: password.value })
        }

        return {
            email,
            password,
            isLoading,
            login,
            errorMessages,
            isError
        }
    }
})

App.mount('#admin-login-page')