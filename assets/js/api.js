
export const adminLoginApi = async (data) => {
    return await axios.post('authenticate_admin.php', data)
}

export const loginApi = async (data) => {
    return await axios.post('authenticate_user.php', data)
}

export const registerApi = async (data) => {
    return await axios.post('register.php', data)
}