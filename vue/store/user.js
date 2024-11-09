export const useUserStore = defineStore("user", {
    state: () => ({ token: "input-your-token-from-backend-here" }),

    actions: {
        login(payload) {
            this.token = payload;
        },
        logout() {
            this.token = "";
        },
    },
});
