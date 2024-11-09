export const useAuthStore = defineStore("auth", {
    state: () => ({
        token: null,
        role: null,
    }),
    actions: {
        loadFromLocalStorage() {
            if (process.client) {
                const storedToken = localStorage.getItem("current_user");
                if (storedToken) {
                    this.token = storedToken;
                    this.role = JSON.parse(storedToken).patient ? "patient" : "user";
                }
            }
        },
        setToken(token) {
            this.token = token;
            this.role = token.patient ? "patient" : "user";
            localStorage.setItem("current_user", JSON.stringify(token));
        },
        logout() {
            this.token = null;
            this.user = null;
            localStorage.removeItem("current_user");
        },
    },
    getters: {
        isAuthenticated(state) {
            return !!state.token;
        },
        isAdmin(state) {
            return state.role === "user";
        },
    },
});
