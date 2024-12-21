export default defineNuxtRouteMiddleware((to, from) => {
    const authStore = useAuthStore();
    const role = authStore.role;

    if (role !== "Dental Nurse") {
        return navigateTo("/user");
    }
});
