export default defineNuxtRouteMiddleware((to, from) => {
    const authStore = useAuthStore();
    const role = authStore.role;
    
    if (role) {
        switch (role) {
            case "Super Admin":
            case "Head Nurse":
            case "Medical Doctor":
                return navigateTo("/user/medical-health-record");

            case "Dental Doctor":
                return navigateTo("/user/dental-health-record");

            case "Medical Nurse":
                return navigateTo("/user/medical-appointment");

            case "Dental Nurse":
                return navigateTo("/user/dental-appointment");
        }
    }
});
