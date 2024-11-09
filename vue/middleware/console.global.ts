export default defineNuxtRouteMiddleware((to, from) => {
    const isLogin = false;
    if (process.client) {
        // Check if we are in the client environment
        const userToken = localStorage.getItem("user");
        console.log(userToken);
    }

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
