<template>
    <layout>

<!--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">-->
<!--            Hello-->
<!--        </h2>-->
        <main class="lg:relative">
            <form class="space-y-6" action="/mwo2" method="POST">
                <input type="hidden" name="_token" :value="csrf">
            <div class="space-y-6">
                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Pay £{{ (price/100).toFixed(2)}}</h3>
                            <p class="mt-1 text-sm text-gray-500">Complete your sign-up by paying for your place.</p>
                            <p class="mt-2 text-sm text-gray-500">Your registration is not complete until you have paid. Please note that registration is first-come first-serve. There are 90 available places, and your confirmation email will state what place you are. If we get more than 90 sign ups, we will contact those who are on the waiting list separately should they get their place.</p>
                            <p class="mt-2 text-sm text-gray-500">Changed your mind? You can get a refund until 01 June 2020 by emailing me at harry@hsmess.dev from the email you registered with.</p>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2" v-if="!paymentConfirmed">
                            <div class="w-100">
                                <form id="payment-form" class="w-100">
                                    <div id="card-element" @change="change()"><!--Stripe.js injects the Card Element--></div>
                                    <button id="submit" @click.prevent="pay()" :disabled="paymentInProgress === true">
                                        <div class="spinner" v-show="paymentInProgress === true" id="spinner"></div>
                                        <span id="button-text" v-show="paymentInProgress === false">Place Order</span>
                                    </button>
                                    <p id="card-error" role="alert"></p>
                                    <!--                                    <p class="result-message d-none">-->
                                    <!--                                        Payment succeeded, see the result in your-->
                                    <!--                                        <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.-->
                                    <!--                                    </p>-->
                                </form>
                            </div>
                        </div>
                        <div class="p-6 sm:px-20 bg-white border-b border-gray-200" v-else>
                            <div class="bg-white px-4 py-5 sm:px-6">
                                <div class="flex space-x-3">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1578269174936-2709b6aeb913?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1351&q=80" alt="">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900">
                                            <span >Thank You! Your order was recieved!</span>
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            <span >£{{ (price/100).toFixed(2)}} paid on {{  new Date().toLocaleString() }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="flex justify-end">-->
<!--                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500" @click="window.location.back()">Cancel</button>-->
<!--                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-rose-300 hover:bg-rose-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500" @click="processAndPay">Pay</button>-->
<!--                </div>-->
            </div>
            </form>
        </main>

    </layout>
</template>

<script>
import Layout from '@/Layouts/Layout'
import Welcome from '@/Jetstream/Welcome'
import GetYourTag from '@/GetYourTag'

export default {
    components: {
        Layout,
        Welcome,
        GetYourTag,
    },
    props: {
        client_secret:String,
        user_id:Number,
        order_id:Number,
        price: Number
    },
    mounted(){
        this.stripe.stripe = window.Stripe(this.$page.props.stripe,{locale:'en-GB'});
        var elements = this.stripe.stripe.elements();
        var style = {
            base: {
                color: "#32325d",
                fontFamily: 'Arial, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#32325d"
                }
            },
            invalid: {
                fontFamily: 'Arial, sans-serif',
                color: "#fa755a",
                iconColor: "#fa755a"
            }
        };
        this.stripe.card = elements.create("card", {hidePostalCode: true,style: style });
        // Stripe injects an iframe into the DOM
        this.stripe.card.mount("#card-element");
    },
    watch: {
        // whenever question changes, this function will run
        state: function (newstate, oldstate) {
            if(newstate === 3)
            {
                this.stripe.stripe = window.Stripe(this.$page.props.stripe,{locale:'en-GB'});
                var elements = this.stripe.stripe.elements();
                var style = {
                    base: {
                        color: "#32325d",
                        fontFamily: 'Arial, sans-serif',
                        fontSmoothing: "antialiased",
                        fontSize: "16px",
                        "::placeholder": {
                            color: "#32325d"
                        }
                    },
                    invalid: {
                        fontFamily: 'Arial, sans-serif',
                        color: "#fa755a",
                        iconColor: "#fa755a"
                    }
                };
                this.stripe.card = elements.create("card", {hidePostalCode: true,style: style });
                // Stripe injects an iframe into the DOM
                this.stripe.card.mount("#card-element");
            }
        }
    },
    computed:{

    },
    methods:{
        pay(){
            this.paymentInProgress = true;

            // unauthorised = access token wrong, so we should try and refresh

            let self = this;
            self.stripe.stripe.confirmCardPayment(self.client_secret,{
                payment_method: {
                    card: self.stripe.card
                }
            }).then(function(result) {
                if (result.error) {
                    // Show error to your customer
                    alert(result.error.message);
                    self.paymentInProgress = false;
                } else {
                    axios.post('/api/user/tournament/confirm', {
                        "user_id": self.user_id,
                        "order_id": self.order_id,
                    }).then(function () {
                        //then reset/clear order everywhere

                        self.paymentInProgress = false;
                        //show confirmed
                        self.paymentConfirmed = true;
                    },);
                }
            }).catch(function(error){
                self.paymentInProgress = false;
                alert('payment failed');

                console.log(error.response);
            });
        },
    },
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            state: 1,
            donation: 0,
            acepot: 0,
            cost: 20,
            first_name: "",
            last_name:"",
            pdga_number: null,
            division: 'MPO',
            loading: false,
            stripe: {
                spk: null,
                stripe: undefined,
                card: undefined,
                msg: 'Pay here',
                lockSubmit: false
            },
            paymentInProgress: false,
            paymentConfirmed: false,
        }
    },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

#payment-form{
    //width: 30vw;
    //min-width: 500px;
    align-self: center;
    box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
    0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
    border-radius: 7px;
    padding: 40px;
    input {
        border-radius: 6px;
        margin-bottom: 6px;
        padding: 12px;
        border: 1px solid rgba(50, 50, 93, 0.1);
        height: 44px;
        font-size: 16px;
        width: 100%;
        background: white;
    }
    #button-text{
        font-size: 14px;
        font-weight: 700;
    }
    .result-message {
        line-height: 22px;
        font-size: 16px;
    }
    .result-message a {
        color: rgba(251, 191, 36,1);
        font-weight: 600;
        text-decoration: none;
    }
    .hidden {
        display: none;
    }
    #card-error {
        color: rgb(105, 115, 134);
        text-align: left;
        font-size: 13px;
        line-height: 17px;
        margin-top: 12px;
    }
    #card-element {
        border-radius: 8px 8px 0 0 ;
        padding: 12px;
        border: 1px solid rgba(50, 50, 93, 0.1);
        height: 44px;
        width: 100%;
        background: white;
    }
    #payment-request-button {
        margin-bottom: 32px;
    }
    /* Buttons and links */
    button {
        background: #fb7085;
        color: #ffffff;
        border-radius: 0 0 8px 8px;
        border: 0;
        padding: 10px 16px;
        height: 44px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        display: block;
        transition: all 0.2s ease;
        box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
        width: 100%;
    }
    button:hover {
        filter: contrast(115%);
    }
    button:disabled {
        opacity: 0.5;
        cursor: default;
    }
    /* spinner/processing state, errors */
    .spinner,
    .spinner:before,
    .spinner:after {
        border-radius: 50%;
    }
    .spinner {
        color: #ffffff;
        font-size: 22px;
        text-indent: -99999px;
        margin: 0px auto;
        position: relative;
        width: 20px;
        height: 20px;
        box-shadow: inset 0 0 0 2px;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
    }
    .spinner:before,
    .spinner:after {
        position: absolute;
        content: "";
    }
    .spinner:before {
        width: 10.4px;
        height: 20.4px;
        background: rgba(251, 191, 36,1);
        border-radius: 20.4px 0 0 20.4px;
        top: -0.2px;
        left: -0.2px;
        -webkit-transform-origin: 10.4px 10.2px;
        transform-origin: 10.4px 10.2px;
        -webkit-animation: loading 2s infinite ease 1.5s;
        animation: loading 2s infinite ease 1.5s;
    }
    .spinner:after {
        width: 10.4px;
        height: 10.2px;
        background: rgba(251, 191, 36,1);
        border-radius: 0 10.2px 10.2px 0;
        top: -0.1px;
        left: 10.2px;
        -webkit-transform-origin: 0px 10.2px;
        transform-origin: 0px 10.2px;
        -webkit-animation: loading 2s infinite ease;
        animation: loading 2s infinite ease;
    }
    @-webkit-keyframes loading {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @keyframes loading {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @media only screen and (max-width: 600px) {
        form {
            width: 80vw;
        }
    }
}
@media only screen and (max-width: 768px){
    #payment-form{
        box-shadow: none;
        padding: 0px !important;
    }
}
</style>
