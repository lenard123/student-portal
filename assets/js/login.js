import { createApp, ref, computed, onMounted } from './vue.js'
import useMutator from './useMutator.js'
import { loginApi } from './api.js'
import { getErrorMessage } from './util.js'

const onSuccess = (data) => {
    console.log({data})
    if (data.role === ROLE_STUDENT) {
        window.location.href = BASE_URL + 'student'
    } else if (data.role === ROLE_TEACHER){
        window.location.href = BASE_URL + 'teacher'
    }
}

const App = createApp({

    mounted() {
        window.history.replaceState({}, document.title, window.location.pathname);
    },

    setup() {

        const hideSuccessAlert = ref(false)
        const { isLoading, execute, isError, data, error } = useMutator(loginApi, {onSuccess})

        const email = ref('')
        const password = ref('')
        const errorMessages = computed(() => {
            return getErrorMessage(error.value)
        })

        const login = () => {
            hideSuccessAlert.value = true
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
            isError,
            hideSuccessAlert
        }
    }
})

App.mount('#login-page')