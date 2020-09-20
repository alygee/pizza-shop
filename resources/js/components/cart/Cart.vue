<template>
    <div>
        <button
            v-tooltip="{
                content: content,
                placement: 'bottom-start',
                delay: { hide: 3000 },
                offset: 12,
                autoHide: false,
                show: false
            }"
            class="bg-orange-500 hover:bg-orange-600 text-white font-semibold hover:text-white py-2 px-4 rounded"
        >
            My order <span class="px-2">|</span> {{ cartQty }}
        </button>
    </div>
</template>

<script>
import CartItems from "./CartItems.vue";

export default {
    name: "Cart",
    components: { CartItems },
    props: {
        items: Array
    },
    mounted() {
        this.$store.dispatch("cart");
    },
    computed: {
        cartQty() {
            return this.$store.getters.cartQty;
        },
        content() {
            if (!this.cartQty) {
                return `
                  <div class="px-6 bg-white border shadow rounded-lg">
                    <div class="font-bold py-6 bg-white">Oops, it’s empty here!</div>
                  </div>`;
            }
            const start = `<div class="px-6 bg-white border shadow rounded-lg">
              <table class="table-auto">
              <thead>
                <tr>
                  <th class="px-4 py-2">Name</th>
                  <th class="px-4 py-2">Qty</th>
                  <th class="px-4 py-2">Price</th>
                </tr>
              </thead>
              <tbody>
            `;
            const end = `</tbody></table>`;
            const amount = `
              <div class="flex justify-between w-full p-4 font-bold">
                <p class="py-4">Amount: $${this.$store.getters.amount}</p>
                <a href="/checkout" class="py-4 text-orange-500 hover:text-orange-600">
                  Checkout
                </a>
              </div>
            `;
            let items = "";
            _.forEach(this.$store.state.cart, item => {
                if (!item) return;
                items += `<tr>
                <td class="border px-4 py-2">${item.name}</td>
                <td class="border px-4 py-2">${item.quantity}</td>
                <td class="border px-4 py-2">${item.price * item.quantity}</td>
              </tr>`;
            });
            return start + items + end + amount;
        }
    }
};
</script>
