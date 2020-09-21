<template>
    <div>
        <section
            class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg"
        >
            <header
                class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md"
            >
                Profile
            </header>

            <div class="w-full">
                <div class="text-gray-700">
                    <div class="min-h-full md:flex">
                        <div class="flex-none w-1/5 md:max-w-xs border-r p-6">
                            <ul
                                class="md:flex-col md:min-w-full flex flex-col list-none"
                            >
                                <li class="items-center">
                                    <a
                                        href="#"
                                        class="py-6 font-bold text-orange-500 hover:text-orange-600"
                                    >
                                        History</a
                                    >
                                </li>
                                <li class="items-center">
                                    <a
                                        href="#"
                                        class="py-6 font-bold block opacity-50 cursor-not-allowed"
                                    >
                                        Shipping / Billing <wbr />info (soon)</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="flex-1 p-6">
                            <table class="table-auto w-full text-center">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">#</th>
                                        <th class="px-4 py-2">Date</th>
                                        <th class="px-4 py-2">Price</th>
                                        <th class="px-4 py-2">Status</th>
                                        <th class="px-4 py-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="order in orders">
                                        <td class="border px-4 py-6">
                                            {{ order.id }}
                                        </td>
                                        <td class="border px-4 py-6">
                                            {{
                                                order.created_at
                                                    | localDateString
                                            }}
                                        </td>
                                        <td class="border px-4 py-6">
                                            {{ sign(order.currency) }}
                                            {{ order.cost }}
                                        </td>
                                        <td class="border px-4 py-6">
                                            {{ order.status | langStatus }}
                                        </td>
                                        <td class="border px-4 py-6">
                                            <router-link
                                                :to="{
                                                    name: 'order.items',
                                                    params: { id: order.id }
                                                }"
                                            >
                                                <span
                                                    class=">bg-white hover:text-orange-600 text-orange-500 border border-orange-500 font-bold py-2 px-4 rounded hover:border-orange-600"
                                                >
                                                    Details
                                                </span></router-link
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
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
    computed: {
        orders() {
            return this.$store.state.orders;
        }
    },
    mounted() {
        this.$store.dispatch("fetchOrders");
    },
    methods: {
        sign(currency) {
            return currency == "usd" ? "$" : "€";
        }
    }
};
</script>
