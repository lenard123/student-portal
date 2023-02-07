import { ref } from 'vue'

// export default  {
//     data: () => ({
//         showPassword: false
//     })
// }

export default {
    setup() {
        const showPassword = ref(false)

        return {
            showPassword
        }
    }
}