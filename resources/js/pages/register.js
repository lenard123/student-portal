import { reactive, ref } from 'vue'

export default {
    setup() {
        const showPassword = ref(false)
        const selectedDepartment = ref('pre_school')
        const departmentLevels = reactive({
            'pre_school': ["Nursery","Kinder"],
            'elementary': [1, 2, 3, 4, 5, 6],
            'highschool': [7,8,9,10],
            'senior_highschool': [11, 12]
        })

        return {
            showPassword,
            selectedDepartment,
            departmentLevels
        }
    }
}