
export async function postFormData(url, data) {
    const response = await fetch(window.API_URL + '/' + url, {
        method: 'POST',
        headers: {
            'Content-Type': ''
        }
    })    
}

const parseData = (data, type) => {
    if (data instanceof FormData)
        return { body: data }

    return {
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    }
}

export async function post(url, data = {}, options = {}) {
    const response = await fetch(window.API_URL + '/' + url, {
        method: 'POST',
        ...parseData(data),
        ...options
    })

    response.data = await response.json()

    if (!response.ok)
        throw response

    return response
}