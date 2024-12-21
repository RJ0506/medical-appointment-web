export default defineNuxtRouteMiddleware((to, from) => {
    const authStore = useAuthStore();
    const role = authStore.role;

    if (role === "Doctor") {
        return navigateTo("/user");
    }
});
