<script>
export default {
    name: "modal",

    methods: {
        close() {
            this.$emit("close");
        },
    },
};
</script>

<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div
                class="modal-dialog"
                role="dialog"
                aria-labelledby="modalTitle"
                aria-describedby="modalDescription"
            >
                <div class="modal-header">
                    <h3 class="modal-title">Sign in</h3>
                    <div class="modal-close" @click="$emit('close')">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            fill="none"
                        >
                            <path
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M14.7886 15.4958C14.9838 15.691 15.3004 15.691 15.4957 15.4958C15.691 15.3005 15.691 14.9839 15.4957 14.7886L8.7782 8.07115L15.4957 1.35366C15.691 1.1584 15.691 0.841816 15.4957 0.646554C15.3004 0.451292 14.9838 0.451292 14.7886 0.646554L8.07109 7.36405L1.35355 0.646508C1.15829 0.451246 0.84171 0.451245 0.646448 0.646508C0.451186 0.84177 0.451186 1.15835 0.646448 1.35361L7.36398 8.07115L0.646447 14.7887C0.451185 14.984 0.451184 15.3005 0.646447 15.4958C0.841709 15.6911 1.15829 15.6911 1.35355 15.4958L8.07109 8.77826L14.7886 15.4958Z"
                                fill="#090909"
                                fill-opacity="0.3"
                            />
                        </svg>
                    </div>
                </div>
                <section class="modal-body">
                    <input
                        type="email"
                        placeholder="e-mail*"
                        value="test2@gmail.com"
                    />
                    <input type="text" placeholder="password*" value="123456" />
                </section>
                <div class="modal-footer">
                    <div class="forgot-password">
                        <button
                            type="button"
                            @click="openModal('passwordRecovery')"
                        >
                            Forgot your password?
                        </button>
                    </div>
                </div>
                <div class="required-note">*Required Fields</div>
            </div>
        </div>
    </transition>
</template>

<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    backdrop-filter: blur(4px);
    z-index: 1050;
    margin: 0;
    padding: 0;
    pointer-events: auto;
    overflow-y: auto;
}

.modal-dialog {
    position: relative;
    width: 670px;
    margin: 160px auto 0;
    background-color: #fff;
    padding: 32px 32px 64px 32px;
}

/* свойства для заголовка модального окна */
.modal-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
}

.modal-title {
    margin-top: 30px;
    color: #090909;
    text-align: center;
    font-size: 24px;
    font-weight: 700;
    line-height: 150%;
    width: 100%;
}

.modal-close {
    padding: 15px;
    margin: -15px;
}

.modal-close:focus,
.modal-close:hover {
    cursor: pointer;
}

.modal-body {
    position: relative;
    width: 552px;
    margin: 15px auto 20px;
    color: #000;
}

.modal-body input {
    width: 510px;
    padding: 7px 20px;
    border-radius: 5px;
    border: 1px solid rgba(9, 9, 9, 0.3);
    color: rgba(9, 9, 9, 0.5);
    font-size: 16px;
    font-weight: 400;
    line-height: 150%; /* 24px */
}

.tab-content .tab-content-column section input.has-error,
.modal-body input.has-error {
    border: 1px solid #ff004d;
}

.tab-content .tab-content-column section input.has-error:focus-visible {
    outline: 1px solid #ff004d;
}

.modal-body input.is-valid {
    border: 1px solid #ffbd19;
}

.modal-body .done {
    margin-top: -10px;
    text-align: center;
}

.modal-body .done-message {
    color: #090909;
    text-align: center;
    font-family: Montserrat;
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    margin-top: 15px;
}

.modal-body .done-back {
    text-align: center;
    margin-top: 37px;
}

.modal-body .done-back a {
    color: #090909;
    text-align: center;
    font-family: Montserrat;
    font-size: 12px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    text-decoration: none;
}

.modal-body .done-back a .link {
    color: #090909;
    font-family: Montserrat;
    font-size: 12px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    text-decoration: underline;
}

.tab-content .tab-content-column section .error-message,
.modal-body .error-message {
    color: #ff004d;
    font-family: Montserrat;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    margin: 9px 0 20px 20px;
    text-align: left;
}

.modal-body .alert-error {
    color: #ff004d;
    font-family: Montserrat;
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 150%; /* 24px */
    border-radius: 5px;
    border: 1px solid #ff004d;
    background: rgba(255, 0, 77, 0.1);
    padding: 7px 20px;
    margin-bottom: 20px;
}

.modal-body input + input {
    margin-top: 20px;
}

.modal-body input:focus,
.modal-body input:focus-visible {
    outline: 1px solid #ffbd19;
}

.modal-body input::placeholder {
    color: rgba(9, 9, 9, 0.5);
    font-size: 16px;
    font-weight: 400;
    line-height: 150%; /* 24px */
}

.modal-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 552px;
    margin: 0 auto;
}

.modal-footer .yellow-button {
    font-family: Montserrat;
    color: #fff;
    text-align: center;
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    text-transform: uppercase;
    padding: 11px 28px;
    border-radius: 5px;
    background: #ffbd19;
    border: none;
    cursor: pointer;
}

.modal-footer .yellow-button:hover {
    background-color: #ff8a00;
}

.modal-footer .forgot-password {
    margin: 0 20px;
}

.modal-footer .forgot-password button {
    color: #090909;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    background: none;
    border: none;
}

.modal-footer .forgot-password button:hover {
    color: #ff8a00;
}

.modal-footer .modal-actions {
    display: flex;
    align-items: center;
}

.yellow-outline-button {
    font-family: Montserrat;
    color: #ff8a00;
    text-align: center;
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    text-transform: uppercase;
    padding: 9px 28px;
    background: #fff;
    cursor: pointer;
    border-radius: 5px;
    border: 1px solid #ff8a00;
}

.yellow-outline-return-button {
    color: #ff8a00;
    padding: 6px 8px;
    background: #fff;
    cursor: pointer;
    border-radius: 5px;
    border: 1px solid #ff8a00;
    margin-right: 15px;
}

.yellow-outline-return-button:hover {
    background-color: #ff8a00;
    color: #fff;
}

.yellow-outline-button:hover {
    color: #fff;
    text-align: center;
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    text-transform: uppercase;
    padding: 9px 28px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    background-color: #ff8a00;
}

.required-note {
    text-align: right;
    color: rgba(9, 9, 9, 0.3);
    font-size: 12px;
    font-weight: 400;
    width: 552px;
    margin: 15px auto;
}

.payment-footer .actions .agreement {
    color: #fff;

    font-family: Montserrat;
    font-size: 10px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.modal-footer .agreement {
    color: #090909;
    font-family: Montserrat;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.payment-footer .actions .agreement label,
.modal-footer .agreement label {
    display: flex;
    align-items: center;
    padding-left: 30px;
}

.payment-footer .actions .agreement label input,
.modal-footer .agreement label input {
    margin-right: 15px;
    appearance: none;
    position: absolute;
}

.payment-footer .actions .agreement label span {
    position: absolute;
    width: 20px;
    height: 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    margin-left: -30px;
    background-image: none;
}

.modal-footer .agreement label span {
    position: absolute;
    width: 20px;
    height: 20px;
    border: 1px solid rgba(9, 9, 9, 0.3);
    margin-left: -30px;
    background-image: none;
}

.payment-footer .actions .agreement label input:checked + span,
.modal-footer .agreement label input:checked + span {
    border: none;
    background-color: #ffbd19;
    background-image: url("/images/check.icon.svg");
    background-repeat: no-repeat;
    background-position: center center;
}

.modal-footer .agreement.has-error {
    color: #ff004d;
    font-family: Montserrat;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.payment-footer .actions .agreement.has-error label span {
    border: 1px solid #ff004d;
    background: rgba(255, 0, 77, 0.2);
}

.payment-footer .actions .agreement.has-error label {
    color: #ff004d;
}

.modal-footer .agreement.has-error label span {
    border: 1px solid #ff004d;
}

.payment-footer .actions .agreement label a {
    color: #fff;
    font-family: Montserrat;
    font-size: 10px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    text-decoration-line: underline;
}

.modal-footer .agreement label a {
    color: #090909;
    font-family: Montserrat;
    font-size: 12px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    text-decoration: underline;
}
.modal-fade-enter,
.modal-fade-leave-active {
    opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity 0.5s ease;
}
</style>
