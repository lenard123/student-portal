
export { default as useMutator } from './useMutator.js'

export const invoke = (callback, ...params) => {
    if (typeof callback === 'function') {
        return callback(...params)
    }
}

export const getErrorMessage = (error) => {

    if (error?.status === 404) {
        return ['Page not found']
    }

    if (error?.data?.message) {
        const { message } = error.data

        if (Array.isArray(message)) 
            return message

        return [message]
    }


    return ['An unknown error occured']
}

export const redirect = (location) => {
    window.location.href = window.BASE_URL + '/' + location
}