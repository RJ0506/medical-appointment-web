export default defineNuxtRouteMiddleware((to, from) => {
    console.log("to", to);
    console.log("from", from);
});
