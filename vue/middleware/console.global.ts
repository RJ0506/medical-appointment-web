export default defineNuxtRouteMiddleware((to, from) => {
    const isLogin = false;
    // NOT LOGIN
    // if (
    //     !isLogin &&
    //     ![
    //         "/",
    //         "/patient-selection",
    //         "/student-registration",
    //         "/employee-registration",
    //         "/register-success",
    //     ].includes(to.path)
    // ) {
    //     return navigateTo("/");
    // }

    // LOGIN
    // if (
    //     isLogin &&
    //     [
    //         "/",
    //         "/patient-selection",
    //         "/student-registration",
    //         "/employee-registration",
    //         "/register-success",
    //     ].includes(to.path)
    // ) {
    //     return navigateTo("/user");
    // }
});
