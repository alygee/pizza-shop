<template>
    <div>
        <section
            class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg"
        >
            <header
                class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md"
            >
                Checkout
            </header>

            <div class="w-full p-6 flex flex-wrap">
                <div
                    class="px-4 overflow-hidden w-full xs:w-full md:w-1/2 mb-4"
                >
                    <shipping-form></shipping-form>
                </div>
                <div
                    class="px-4 my-4 overflow-hidden w-full xs:w-full md:w-1/2"
                >
                    <checkout-cart></checkout-cart>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import CheckoutCart from "./Cart.vue";
import ShippingForm from "./ShippingForm.vue";

export default {
    name: "Checkout",
    components: { CheckoutCart, ShippingForm }
};
</script>
