<template>
    <div class="checkout">
        <div class="products">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Item</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(product, id) in cart" :key="id">
                        <td>
                            <div class="product">
                                <img :src="product.image" :alt="product.name" />
                                <div>
                                    <div class="product-name">
                                        {{ product.name }}
                                    </div>
                                    <div class="product-description">
                                        {{ product.description }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="qty">
                            <input
                                type="number"
                                :value="product.quantity"
                                @input="changeQty(product, $event)"
                            />
                        </td>
                        <td>
                            <div class="product-price-wrapper">
                                <div></div>
                                <div class="product-price">
                                    ${{ product.price }}
                                </div>
                                <div class="product-remove">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="11"
                                        height="11"
                                        viewBox="0 0 11 11"
                                        fill="none"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M9.38547 10.4729C9.58073 10.6682 9.89731 10.6682 10.0926 10.4729C10.2878 10.2777 10.2878 9.9611 10.0926 9.76584L5.82664 5.49991L10.0926 1.23398C10.2878 1.03872 10.2878 0.722136 10.0926 0.526874C9.89731 0.331611 9.58073 0.331611 9.38547 0.526874L5.11954 4.7928L0.853554 0.526818C0.658292 0.331555 0.34171 0.331556 0.146448 0.526818C-0.0488146 0.72208 -0.0488151 1.03866 0.146448 1.23392L4.41243 5.49991L0.146447 9.76589C-0.0488158 9.96116 -0.0488154 10.2777 0.146447 10.473C0.341709 10.6683 0.658291 10.6683 0.853554 10.473L5.11954 6.20702L9.38547 10.4729Z"
                                            fill="currentColor"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="payment">
            <div class="payment-header">
                <h2>Payment options</h2>
            </div>
            <div class="payment-body">
                <div class="promo-wrapper">
                    <input class="promo" type="text" placeholder="Promo code" />
                    <button>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="8"
                            height="13"
                            viewBox="0 0 8 13"
                            fill="none"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M6.16323 6.50002L0.96967 1.30645C0.676777 1.01356 0.676777 0.538686 0.96967 0.245793C1.26256 -0.0471005 1.73744 -0.0471002 2.03033 0.245793L7.74034 5.95581C7.89031 6.10577 7.96349 6.30345 7.95989 6.49997C7.96351 6.69653 7.89033 6.89424 7.74034 7.04423L2.03033 12.7542C1.73744 13.0471 1.26256 13.0471 0.96967 12.7542C0.676777 12.4613 0.676777 11.9865 0.96967 11.6936L6.16323 6.50002Z"
                                fill="currentColor"
                            />
                        </svg>
                    </button>
                </div>
                <h3>Summary</h3>
                <div class="subtotal">
                    <div>
                        <div>Subtotal</div>
                        <div class="value">${{ amount }}</div>
                    </div>
                    <div>
                        <div>Total discount</div>
                        <div class="value">$0</div>
                    </div>
                </div>
            </div>
            <div class="payment-footer">
                <div class="total">
                    <div>Total</div>
                    <div class="amount">
                        <div class="value">$167</div>
                        <div class="tax-label">Vat may apply</div>
                    </div>
                </div>
                <div class="actions">
                    <div class="agreement has-error">
                        <label>
                            <input type="checkbox" />
                            <span></span>
                            <div>
                                I accept <br />
                                <a href="#">terms &#38; conditions</a>
                            </div>
                        </label>
                    </div>
                    <div class="pay">
                        <button type="button">PAY</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { debounce } from "lodash";
import CheckoutCart from "./Cart.vue";
import ShippingForm from "./ShippingForm.vue";

export default {
    name: "Checkout",
    components: { CheckoutCart, ShippingForm },
    computed: {
        cart() {
            return this.$store.getters.cartItems;
        },
        amount() {
            return Number(
                this.$store.getters.amount *
                    this.$store.getters.currencyMultiplier
            ).toFixed(2);
        },
    },
    methods: {
        changeQty: debounce(function (product, event) {
            const item = { ...product, quantity: event.target.value };
            this.$store.dispatch("updateCartItem", item);
        }, 300),
    },
};
</script>

<style>
.checkout {
    display: flex;
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    padding-bottom: 18px;
}

.checkout .products {
    border-radius: 5px;
    background: rgba(80, 77, 91, 0.15);
    padding: 40px 30px;
}

.checkout .products table {
    width: 100%;
}
.checkout .products table th {
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    border-bottom: 1px solid #504d5b;
    padding-bottom: 18px;
}

.checkout .products table td {
    text-align: center;
}

.checkout .products table td.qty {
    font-size: 14px;
    font-weight: 400;
    text-align: center;
}

.checkout .products table td.qty input {
    font-family: Montserrat;
    background-color: transparent;
    padding: 8px 10px;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 14px;
    font-style: normal;
    font-weight: 300;
    text-align: center;
}

.checkout .products table td .product {
    display: flex;
    align-items: center;
    text-align: left;
    padding: 10px 0;
}

.checkout .products table td .product img {
    width: 118px;
    height: 108px;
}

.checkout .products table td .product .product-name {
    font-size: 14px;
    font-weight: 700;
}

.checkout .products table td .product .product-description {
    font-size: 12px;
    font-weight: 400;
    color: rgba(255, 255, 255, 0.6);
    margin-top: 5px;
}

.checkout .products table td .product-price-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.checkout .products table td .product-price {
    color: #fff;
    text-align: right;
    font-family: Montserrat;
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    margin: 0 15px;
}

.checkout .products table td .product-remove {
    cursor: pointer;
    color: #ffffff4d;
}

.checkout .products table td .product-remove:hover svg {
    color: #fff;
}

.checkout .payment {
    border-radius: 5px;
    background: rgba(80, 77, 91, 0.15);
    margin-left: 17px;
    padding: 10px 30px 35px;
    text-align: left;
}

.checkout .payment .payment-header {
    padding: 30px 0 18px;
    border-bottom: 1px solid #504d5b;
}

.checkout .payment h2 {
    color: #fff;
    text-align: center;
    font-family: Montserrat;
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    margin: 0;
}

.checkout .payment input.promo:focus-visible {
    outline: 1px solid #504d5b;
}

.checkout .payment .payment-body {
    padding: 30px 0 25px;
    border-bottom: 1px solid #504d5b;
}

.checkout .payment .promo-wrapper {
    margin: 0 0 20px;
    display: flex;
    flex-direction: row;
}

.checkout .payment .promo-wrapper button {
    background-color: #fff;
    border-radius: 0 5px 0px 0px;
    border-top: 1px solid #504d5b;
    border-right: 1px solid #504d5b;
    border-bottom: 1px solid #504d5b;
    border-left: none;
    cursor: pointer;
}

.checkout .payment .promo-wrapper input.promo {
    flex-grow: 2;
    font-family: Montserrat;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: 150%; /* 21px */
    border-top: 1px solid #504d5b;
    border-left: 1px solid #504d5b;
    border-right: none;
    border-bottom: 1px solid #504d5b;
    border-radius: 5px 0px 0px 5px;
    background: #fff;
    padding: 6px 20px;
    color: #090909;
    text-transform: uppercase;
}

.checkout .payment .promo-wrapper button svg {
    color: rgba(9, 9, 9, 0.3);
}

.checkout .payment .promo-wrapper.success button svg {
    color: #ff8a00;
}

.checkout .payment h3 {
    color: #fff;

    font-family: Montserrat;
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
}

.checkout .payment .subtotal > div {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #fff;

    font-family: Montserrat;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: 150%; /* 21px */
    margin-bottom: 5px;
}

.checkout .payment .subtotal .value {
    color: #fff;

    text-align: right;
    font-family: Montserrat;
    font-size: 16px;
    font-style: normal;
    font-weight: 700;
    line-height: 150%; /* 24px */
}

.checkout .payment .payment-footer {
    margin-top: 30px;
}

.checkout .payment .payment-footer .total {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    color: #fff;
    font-family: Montserrat;
    font-size: 18px;
    font-style: normal;
    font-weight: 600;
    line-height: 150%; /* 27px */
}

.checkout .payment .payment-footer .amount {
    text-align: right;
    font-weight: 700;
}

.checkout .payment .payment-footer .amount .tax-label {
    color: rgba(255, 255, 255, 0.3);
    text-align: center;
    font-family: Montserrat;
    font-size: 8px;
    font-style: normal;
    font-weight: 500;
    line-height: 150%; /* 12px */
}

.checkout .payment .payment-footer .actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 20px;
}

.checkout .payment .payment-footer .actions .pay button {
    font-family: Montserrat;
    color: #fff;
    text-align: center;
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    text-transform: uppercase;
    padding: 6px 28px;
    border-radius: 5px;
    background: #ffbd19;
    border: none;
    cursor: pointer;
}
.checkout .payment .payment-footer .actions .pay button:hover {
    background-color: #ff8a00;
}
</style>
