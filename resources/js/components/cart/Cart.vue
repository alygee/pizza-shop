<template>
    <div>
        <div class="inline-block relative w-32 mr-4">
            <select
                class="block appearance-none w-full bg-white border border-orange-500 hover:border-orange-600 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                v-model="currency"
            >
                <option value="usd">$ USD </option>
                <option value="eur">€ EUR</option>
            </select>
            <div
                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-orange-600"
            >
                <svg
                    class="fill-current h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                    />
                </svg>
            </div>
        </div>
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
        this.$store.dispatch("updateCurrency");
    },
    computed: {
        cartQty() {
            return this.$store.getters.cartQty;
        },
        currency: {
            get() {
                return this.$store.state.currency;
            },
            set(currency) {
                this.$store.dispatch("updateCurrency", { currency });
            }
        },
        sign() {
            return this.$store.getters.currencySign;
        },
        amount() {
            return Number(
                this.$store.getters.amount *
                    this.$store.getters.currencyMultiplier
            ).toFixed(2);
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
                <p class="py-4">Amount: ${this.sign} ${this.amount}</p>
                <a href="/checkout" class="py-4 text-orange-500 hover:text-orange-600">
                  Checkout
                </a>
              </div>
            `;
            let items = "";
            _.forEach(this.$store.getters.cartItems, item => {
                if (!item) return;
                items += `<tr>
                <td class="border px-4 py-2">${item.name}</td>
                <td class="border px-4 py-2">${item.quantity}</td>
                <td class="border px-4 py-2">${this.price(item)}</td>
              </tr>`;
            });
            return start + items + end + amount;
        }
    },
    methods: {
        price(item) {
            return Number(
                item.price *
                    item.quantity *
                    this.$store.getters.currencyMultiplier
            ).toFixed(2);
        }
    }
};
</script>
