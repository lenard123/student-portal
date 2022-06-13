
export { default as useMutator } from './useMutator.js'

export const invoke = (callback, ...params) => {
    if (typeof callback === 'function') {
        return callback(...params)
    }
}

export const getErrorMessage = (error) => {

    if (error?.response?.status === 404) {
        return ['Page not found']
    }

    if (error?.response?.data?.message) {
        const { message } = error.response.data

        if (Array.isArray(message)) 
            return message

        return [message]
    }


    return ['An unknown error occured']
}