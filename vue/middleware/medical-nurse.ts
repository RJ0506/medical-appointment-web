export default defineNuxtRouteMiddleware((to, from) => {
    const authStore = useAuthStore();
    const role = authStore.role;

    if (role === "Medical Nurse") {
        return navigateTo("/user/medical-appointment");
    }
});
