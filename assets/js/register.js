import { createApp, ref, unref, reactive, computed } from './vue.js'
import useMutator from './useMutator.js'
import { registerApi } from './api.js'
import { getErrorMessage } from './util.js'

createApp({
    setup() {

        const { execute, isLoading, isError, error } = useMutator(registerApi, {
            onSuccess()
            {
                window.location.href = BASE_URL + 'login.php?status=REGISTERED'
            }
        })

        const errorMessages = computed(()  => {
            return getErrorMessage(error.value)
        })
        
        const data = reactive({
            role: ROLE_STUDENT,
            firstname: null,
            middlename: null,
            lastname: null,
            birthday: null,
            email: null,
            gender: null,
            password: null,
            password_confirmation: null,
        })

        const handleSubmit = () => {
            if (isLoading.value) 
                return;
            execute(data)
        }

        return { data, handleSubmit, isLoading, isError, errorMessages }
    }
}).mount('#register-page')