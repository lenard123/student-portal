
export async function post(url, data = {}) {
    const response = await fetch(window.API_URL + '/' + url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })

    response.data = await response.json()

    if (!response.ok)
        throw response

    return response
}