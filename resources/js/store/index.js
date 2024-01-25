export default {
    state: {
        cart: {},
        currency: "usd",
        orders: [],
        user: {},
    },
    getters: {
        cartQty(state) {
            return _.reduce(
                state.cart,
                function (sum, n) {
                    return n && n.quantity ? sum + n.quantity : sum;
                },
                0
            );
        },
        amount(state) {
            return _.reduce(
                state.cart,
                function (sum, n) {
                    return n && n.quantity ? sum + n.quantity * n.price : sum;
                },
                0
            );
        },
        currencySign(state) {
            return state.currency === "usd" ? "$" : "€";
        },
        currencyMultiplier(state) {
            return state.currency === "usd" ? 1 : 0.84;
        },
        cartItems(state) {
            return _.omit(state.cart, "currency");
        },
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
            state.cart[payload.id].quantity = payload.quantity;
            this._vm.$toastr.i("Cart updated");
        },
        setOrders(state, payload) {
            state.orders = payload;
        },
        removeFromCart(state, productId) {
            if (!state.cart[productId]) {
                console.error("no such item");
                return;
            }

            if (state.cart[productId].quantity > 1) {
                state.cart[productId].quantity--;
            } else {
                this._vm.$delete(state.cart, productId);
            }
            this._vm.$toastr.i("Removed from cart");
        },
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
        },
        fetchOrders({ commit }) {
            axios.get(`/orders/list`).then(({ data }) => {
                commit("setOrders", data);
            });
        },
        removeFromCart({ commit }, productId) {
            axios.delete(`/cart/${productId}`).then(({ data }) => {
                commit("removeFromCart", productId);
            });
        },
    },
};
