<template>
    <layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Get Your Tag Now!
            </h2>
        </template>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200" v-show="paymentConfirmed === false">


                        <div class="mt-8">
                            <div class="lg:border-t lg:border-b lg:border-gray-200">
                                <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
                                    <ol class="rounded-md overflow-hidden lg:flex lg:border-l lg:border-r lg:border-gray-200 lg:rounded-none">
                                        <li class="relative overflow-hidden lg:flex-1">
                                            <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                                                <!-- Completed Step -->
                                                <a href="#" @click="state = 1" class="group" v-show="state > 1">
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center bg-rose-400 rounded-full">
                                                          <!-- Heroicon name: solid/check -->
                                                          <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                          </svg>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold tracking-wide uppercase">Get your Tag</span>
                                                        <span class="text-sm font-medium text-gray-500">Give us some details</span>
                                                      </span>
                                                    </span>
                                                </a>
                                                <a href="#" @click="state = 1"  aria-current="step" v-show="state === 1">
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-rose-400 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-rose-400 rounded-full">
                                                          <span class="text-rose-400">01</span>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold text-rose-400 tracking-wide uppercase">Get your Tag</span>
                                                        <span class="text-sm font-medium text-gray-500">Give us some details</span>
                                                      </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="relative overflow-hidden lg:flex-1">
                                            <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                                                <!-- Upcoming Step -->
                                                <a href="#" @click="state = 2"  aria-current="step" v-show="state === 2">
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-rose-400 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-rose-400 rounded-full">
                                                          <span class="text-rose-400">02</span>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold text-rose-400 tracking-wide uppercase">Check Out</span>
                                                        <span class="text-sm font-medium text-gray-500">Complete your purchase</span>
                                                      </span>
                                                    </span>
                                                </a>
                                                <a href="#" @click="state = 2"  class="group" v-show="state < 2">
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                                                          <span class="text-gray-500">02</span>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Check Out</span>
                                                        <span class="text-sm font-medium text-gray-500">Complete your purchase</span>
                                                      </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        <div class="mt-6 text-gray-500" v-if="state === 1">

                            <div class="space-y-6">
                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        Your Order
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:p-6">
                                        <div> 1x 2023 Manchester Bag Tag - <span class="text-gray-900 text-lg">£{{ tagCost }}</span></div>
                                        <div> 1x 2023 MDG Membership - <span class="text-gray-900 text-lg">£0.00</span></div>
                                        <div><span class="text-gray-900 text-lg">Total: £{{totalCost}}</span></div>  </div>
                                </div>
                                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                                    <div class="md:grid md:grid-cols-3 md:gap-6">
                                        <div class="md:col-span-1">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Buy your tag</h3>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Please select your options, and then click next to proceed to the fundraiser. Buying a bagtag also gets you Manchester Disc Golf membership for 2023.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button @click="state = 2" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400">
                                            Next
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-6 text-gray-500" v-show="state === 2">
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    Your Order
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                                    <div> 1x 2023 Manchester Bag Tag - <span class="text-gray-900 text-lg">£{{ tagCost }}</span></div>
                                    <div> 1x 2023 MDG Membership - <span class="text-gray-900 text-lg">£0.00</span></div>
                                    <div><span class="text-gray-900 text-lg">Total: £{{totalCost}}</span></div>
                                </div>
                            </div>
                            <div class="w-100">
                                <form id="payment-form" class="w-100">
                                    <div id="card-element" @change="change()"><!--Stripe.js injects the Card Element--></div>
                                    <button id="submit" @click.prevent="pay()" :disabled="paymentInProgress === true">
                                        <div class="spinner" v-show="paymentInProgress === true" id="spinner"></div>
                                        <span id="button-text" style="color: black" v-show="paymentInProgress === false">Place Order</span>
                                    </button>
                                    <p id="card-error" role="alert"></p>
<!--                                    <p class="result-message d-none">-->
<!--                                        Payment succeeded, see the result in your-->
<!--                                        <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.-->
<!--                                    </p>-->
                                </form>
                            </div>
<!--                                STRIPE CHECKOUT HERE-->
                            <div class="flex justify-end pt-6">
                                <button @click="state = 1" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-rose-400 bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-grey-400">
                                    Back
                                </button>
                                <button @click="pay()" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400">
                                    Pay
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200" v-show="paymentConfirmed === true">
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
                                        <span >£{{totalCost}} paid on {{  new Date().toLocaleString() }}</span>
                                    </p>
                                </div>
                            </div>

                            <a href="/dashboard" type="button" class="mt-3 ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400">
                                Go To Your Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        mounted(){
            console.log(this.user);
            if(this.user.paid_2023)
            {
                window.location.href = '/dashboard';
            }
        },
        watch: {
            // whenever question changes, this function will run
            state: function (newstate, oldstate) {
                if(newstate === 2)
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
            user(){
                return this.$page.props.user;
            },
            tagCost(){
                return this.tag.toFixed(2);
            },
            totalCost(){
                return (this.tag).toFixed(2);
            }
        },
        methods:{
            pay(){
                this.paymentInProgress = true;

                // unauthorised = access token wrong, so we should try and refresh

                let self = this;
                axios.post('/api/user/pay', {
                    'user_id': self.$page.props.user.id,
                    'tag': self.tag,
                    'paymentConfirmed': false
                }).then(function (response) {
                    //next bit here
                    // console.log(response.data);
                    self.stripe.stripe.confirmCardPayment(response.data.client_secret,{
                        payment_method: {
                            card: self.stripe.card
                        }
                    }).then(function(result) {
                        if (result.error) {
                            // Show error to your customer
                            alert(result.error.message);
                            self.paymentInProgress = false;
                        } else {
                            axios.post('/api/user/pay/confirm', {
                                "user_id": self.$page.props.user.id,
                                "order_id": response.data.order_id
                            }).then(function () {
                                //then reset/clear order everywhere

                                self.paymentInProgress = false;
                                //show confirmed
                                self.paymentConfirmed = true;
                            },);
                        }
                    });
                }).catch(function(error){
                    self.paymentInProgress = false;
                    alert('payment failed');

                    console.log(error.response);
                });
            },
        },
        data() {
            return {
                state: 1,
                tag: 5,
                loading: false,
                stripe: {
                    spk: null,
                    stripe: undefined,
                    card: undefined,
                    msg: 'Pay here',
                    lockSubmit: false
                },
                paymentInProgress: false,
                paymentConfirmed: false
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

        .bg-rose-400{
            background-color: lavender;
        }
        .bg-lavender{
            background-color: lavenderblush;
        }
        .text-rose-200{
            color: lavenderblush;
        }
        .text-rose-400{
            color: lavender;
        }
        .text-rose-600{
            color: mediumpurple;
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
            color:lavender;
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
            background: lavender;
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
            background: lavender;
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
            background: lavender;
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
