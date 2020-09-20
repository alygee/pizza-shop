export default {
    state: {
        cart: []
    },
    getters: {
        cartQty(state) {
            return _.reduce(
                state.cart,
                function(sum, n) {
                    return n && n.quantity ? sum + n.quantity : sum;
                },
                0
            );
        },
        amount(state) {
            return _.reduce(
                state.cart,
                function(sum, n) {
                    return n && n.quantity ? sum + n.quantity * n.price : sum;
                },
                0
            );
        }
    },
    mutations: {
        cart(state, payload) {
            state.cart = payload;
        },
        addToCart(state, payload) {
            if (state.cart[payload.id]) {
                state.cart[payload.id].quantity++;
            } else {
                this._vm.$set(state.cart, payload.id, payload.item);
            }
            this._vm.$toastr.i("Added to cart");
        },
        updateCartItem(state, payload) {
            if (!payload.quantity) {
                this._vm.$delete(state.cart, payload.id);
            }
        }
    },
    actions: {
        cart({ commit }) {
            axios.get("/cart/list").then(({ data }) => {
                this.cart = data;
                commit("cart", data);
            });
        },
        addToCart({ commit }, payload) {
            axios.post(`/cart/${payload.id}`).then(({ data }) => {
                commit("addToCart", { item: data, id: payload.id });
            });
        },
        updateCartItem({ commit }, payload) {
            axios.put("/cart/update", payload).then(({ data }) => {
                commit("updateCartItem", { ...data, id: payload.id });
            });
        }
    }
};
