export const useAuthStore = defineStore("auth", {
    state: () => ({
        token: localStorage.getItem("user") || null, // Try to load from localStorage
    }),
    actions: {
        setToken(token) {
            this.token = token;
            localStorage.setItem("user", token); // Store token in localStorage
        },
        removeToken() {
            this.token = null;
            localStorage.removeItem("user"); // Remove token from localStorage
        },
    },
});
