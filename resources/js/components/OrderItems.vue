<template>
    <section
        class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg"
    >
        <header
            class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md"
        >
            Orderinfo
        </header>

        <div class="w-full p-6 flex flex-wrap">
            <div class="px-4 overflow-hidden w-full xs:w-full md:w-1/2">
                <div class="rounded shadow-lg mb-6">
                    <h2 class="mb-6 font-semibold">Info</h2>
                    <div class="p-6 bg-white shadow rounded-lg">
                        <p class="p-6 flex justify-between border-t border-b">
                            <span class="font-semibold">Order </span
                            ><span>#{{ order.id }}</span>
                        </p>
                        <p class="p-6 flex justify-between border-t border-b">
                            <span class="font-semibold">Date </span
                            ><span>{{
                                order.created_at | localDateString
                            }}</span>
                        </p>
                        <p class="p-6 flex justify-between border-t border-b">
                            <span class="font-semibold">Amount</span
                            ><span
                                >{{ sign(order.currency) }}
                                {{ order.cost }}</span
                            >
                        </p>
                        <p class="p-6 flex justify-between border-t border-b">
                            <span class="font-semibold">Status </span
                            ><span>{{ order.status | langStatus }}</span>
                        </p>
                        <p class="p-6 flex justify-between border-t border-b">
                            <span class="font-semibold">Shipping cost </span
                            ><span
                                >{{ sign() }}
                                {{ shipping(order.currency) }}</span
                            >
                        </p>
                        <p class="p-6 flex justify-between border-t border-b">
                            <span class="font-semibold">Payment method</span
                            ><span>on delivery</span>
                        </p>
                        <p class="p-6 flex justify-between border-t border-b">
                            <span class="font-semibold">Total</span
                            ><span>{{ sign() }} {{ order.cost }}</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="px-4 my-4 overflow-hidden w-full xs:w-full md:w-1/2">
                <div class="rounded shadow-lg mb-6">
                    <div class="p-6 bg-white shadow rounded-lg">
                        <h2 class="mb-6 font-semibold">Items</h2>
                        <table class="table-auto w-full text-center">
                            <tbody>
                                <tr
                                    v-for="item in items"
                                    class="border-t border-b"
                                >
                                    <td class="py-2 w-20 h-20">
                                        <img :src="item.image" />
                                    </td>
                                    <td class="px-4 py-2">
                                        <div
                                            class="flex items-center text-left"
                                        >
                                            <div>
                                                <p
                                                    class="leading-none font-semibold"
                                                >
                                                    {{ item.name }}
                                                </p>
                                                <p class="text-sm">
                                                    {{ item.description }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-lg font-semibold px-4">
                                        {{ sign() }}{{ item.price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "OrderItems",
    filters: {
        localDateString: function(value) {
            return new Date(value).toLocaleDateString();
        },
        langStatus(status) {
            if (status == 1) {
                return "Assembling";
            } else if (status == 2) {
                return "Delivering";
            } else if (status == 3) {
                return "Submitted";
            } else {
                return "Completed";
            }
        }
    },
    data() {
        return {
            order: {},
            items: []
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        sign(currency) {
            return currency == "usd" ? "$" : "€";
        },
        shipping(currency) {
            return currency == "usd" ? 5 : 5 * 0.84;
        },
        fetchData() {
            axios.get(`/orders/${this.$route.params.id}`).then(({ data }) => {
                this.order = data.order;
                this.items = data.items;
            });
        }
    }
};
</script>
