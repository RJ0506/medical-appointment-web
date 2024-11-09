export const useAuthStore = defineStore("auth", {
    state: () => ({
        token: localStorage.getItem("user") || null,
    }),
    actions: {
        setToken(token) {
            this.token = token;
            localStorage.setItem("user", token);
        },
        removeToken() {
            this.token = null;
            localStorage.removeItem("user");
        },
    },
});
