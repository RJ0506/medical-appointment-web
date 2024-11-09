export const useAuthStore = defineStore("auth", {
    state: () => ({
        token: null,
        name: "dean",
    }),
    actions: {
        loadFromLocalStorage() {
            if (process.client) {
                const storedToken = localStorage.getItem("current_user");
                if (storedToken) {
                    this.token = storedToken;
                }
            }
        },
        setToken(token) {
            this.token = token;
            localStorage.setItem("current_user", token);
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
    },
});
