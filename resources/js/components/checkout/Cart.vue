<template>
    <div class="rounded shadow-lg mb-6">
        <div class="p-6 bg-white shadow rounded-lg">
            <h2 class="mb-6 font-semibold">Basket</h2>
            <table class="table-auto w-full text-center">
                <tbody>
                    <tr v-for="(item, id) in cart" class="border-t border-b">
                        <td class="py-2 w-20 h-20">
                            <img :src="item.image" :alt="item.name" />
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex items-center text-left">
                                <div class="">
                                    <p class="leading-none font-semibold">
                                        {{ item.name }}
                                    </p>
                                    <p class="text-sm">
                                        {{ item.description }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-2">
                            <div
                                class="border rounded flex justify-between p-2 items-center"
                            >
                                <button @click="decrease(item, id)">
                                    <svg
                                        class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M20 12H4"
                                        ></path>
                                    </svg>
                                </button>
                                <span class="px-4">{{ item.quantity }}</span>
                                <button @click="increase(item, id)">
                                    <svg
                                        class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                        ></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                        <td class="text-lg font-semibold px-4">
                            {{ item.price * item.quantity }}$
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2 class="mt-6 font-bold">Amount: ${{ amount }}</h2>
        </div>
    </div>
</template>

<script>
export default {
    name: "CheckoutCart",
    computed: {
        cart() {
            return this.$store.state.cart;
        },
        amount() {
            return this.$store.getters.amount;
        }
    },
    methods: {
        increase(item, id) {
            item.quantity++;
            this.$store.dispatch("updateCartItem", { ...item, id });
        },
        decrease(item, id) {
            item.quantity--;
            this.$store.dispatch("updateCartItem", { ...item, id });
        }
    }
};
</script>
