export const useCounterStore = defineStore('counter', {
    state: () => ({ count: 8 }),
    getters: {
      double: (state) => state.count * 2,
    },
    actions: {
      increment() {
        this.count++
      },
    },
  })
  
  