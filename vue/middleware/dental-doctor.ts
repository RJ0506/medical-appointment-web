export default defineNuxtRouteMiddleware((to, from) => {
    const authStore = useAuthStore();
    const role = authStore.role;

    if (role === "Dental Doctor") {
        return navigateTo("/user/dental-health-record");
    }
});
