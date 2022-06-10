
export const invoke = (callback, ...params) => {
    if (typeof callback === 'function') {
        return callback(...params)
    }
}

export const getErrorMessage = (error) => {

    if (error?.response?.data?.message) {
        return error.response.data.message;
    }

    return 'An unknown error occured'
}