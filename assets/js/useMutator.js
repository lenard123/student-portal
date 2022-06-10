import { createApp, ref, reactive } from './vue.js'
import { invoke } from './util.js'

const useMutator = (callback, option) => {

    const isLoading = ref(false)
    const isError = ref(false)
    const isSuccess = ref(false)
    const data = ref(null)
    const error = ref(null)

    const execute = async(params) => {

        isLoading.value = true
        isSuccess.value = false
        isError.value = false

        try {
            const result = await callback(params)
            isSuccess.value = true
            data.value = result
            invoke(option?.onSuccess, data)
        } catch (_error) {
            isError.value = true
            error.value = _error
            invoke(option?.onError, _error)
        } finally {
            isLoading.value = false
        }
    }

    return { isLoading, isError, isSuccess, execute, error, data }

}

export default useMutator