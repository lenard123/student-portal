
export const adminLoginApi = async (data) => {
    return await axios.post('authenticate_admin.php', data)
}
