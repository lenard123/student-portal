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
            data.value = result.data
            invoke(option?.onSuccess, data.value)
        } catch (_error) {
            isError.value = true
            error.value = _error
            invoke(option?.onError, error.value)
        } finally {
            isLoading.value = false
            invoke(option?.onSettled, { error, data })
        }
    }

    return { isLoading, isError, isSuccess, execute, error, data }

}

export default useMutator