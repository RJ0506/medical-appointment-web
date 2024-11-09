import { useAuthStore } from "@/store/auth";
export default defineNuxtRouteMiddleware((to, from) => {
    const authStore = useAuthStore();
    authStore.loadFromLocalStorage();
    const isAuthenticated = authStore.isAuthenticated;

    // NOT LOGIN
    if (
        !isAuthenticated &&
        ![
            "/",
            "/patient-selection",
            "/student-registration",
            "/employee-registration",
            "/register-success",
        ].includes(to.path)
    ) {
        return navigateTo("/");
    }

    // LOGIN
    if (
        isAuthenticated &&
        [
            "/",
            "/patient-selection",
            "/student-registration",
            "/employee-registration",
            "/register-success",
        ].includes(to.path)
    ) {
        return navigateTo("/user");
    }
});
