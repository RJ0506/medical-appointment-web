import { useAuthStore } from "~/stores/auth";
export default defineNuxtRouteMiddleware((to, from) => {

    //SKIP MIDDLEWARE ON SERVER
    if(import.meta.server) return;
    
    const authStore = useAuthStore();
    authStore.loadFromLocalStorage();
    const isAuthenticated = authStore.isAuthenticated;
    const isAdmin = authStore.isAdmin;

    // NOT LOGIN
    if (
        !isAuthenticated &&
        ![
            "/",
            "/admin",
            "/patient-selection",
            "/student-registration",
            "/employee-registration",
            "/register-success",
        ].includes(to.path)
    ) {
        return navigateTo("/");
    }

    // PATIENT
    if (isAuthenticated && !isAdmin && !to.path.startsWith("/patient")) {
        return navigateTo("/patient");
    }

    // ADMIN & DOCTOR & NURSE
    if (isAuthenticated && isAdmin && !to.path.startsWith("/user")) {
        return navigateTo("/user");
    }
});
