<template>
    <layout>

<!--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">-->
<!--            Hello-->
<!--        </h2>-->
        <main class="lg:relative">
            <form class="space-y-6" action="/masters-2022" method="POST">
                <input type="hidden" name="_token" :value="csrf">
            <div class="space-y-6">
                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900" style="color: #5271fe">Registration</h3>
                            <p class="mt-1 text-sm text-gray-500">Tournament fee: £30.00</p>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="name" id="name" class="focus:ring-rose-500 focus:border-rose-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Paul McBeth">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="pdga" class="block text-sm font-medium text-gray-700"> PDGA Number (optional) </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input type="text" name="pdga" id="pdga" class="focus:ring-rose-500 focus:border-rose-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="27523">
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">Required to get round ratings. Want to get a PDGA Number? <a class="relative cursor-pointer bg-white rounded-md font-medium text-rose-600 hover:text-rose-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-rose-500" href="https://www.pdga.com/membership/select" style="color: #5271fe">Sign up here!</a></p>
                                    </div>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">This tournament is on the BDGA Masters Tour. To earn points towards your season finale, or qualify for the British Championships you need to be a Full BDGA member. <a class="relative cursor-pointer bg-white rounded-md font-medium text-rose-600 hover:text-rose-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-rose-500" style="color: #5271fe" href="https://bdga.org.uk/shop/full-membership/">Sign up here!</a></p>



                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-rose-500 focus:border-rose-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="paul@mcbeastmode.com">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="division" class="block text-sm font-medium text-gray-700">Division</label>
                                    <select id="division" name="division" autocomplete="division-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm">
                                        <option>MP40</option>
                                        <option>MP50</option>
                                        <option>MP60</option>
                                        <option>FP40</option>
                                        <option>FP50</option>
                                        <option>MA40</option>
                                        <option>MA50</option>
                                        <option>MA60</option>
                                        <option>FA40</option>
                                        <option>FA50</option>
                                        <option>MPO</option>
                                        <option>FPO</option>
                                        <option>MA2</option>
                                        <option>FA2</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Additional options</h3>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                                <div class="border-b-2 pb-2 pt-2">
                                    <fieldset>
                                        <div>
                                            <legend class="text-base font-medium text-gray-900">Ace Pot</legend>
                                            <p class="text-sm text-gray-500">There's plenty of ace chances at Lilford. Got to be in it to win it!</p>
                                        </div>
                                        <div class="mt-4 space-y-4">
                                            <div class="flex items-center">
                                                <input id="acepot-yes" value="true" name="ace-pot" type="radio" class="focus:ring-rose-500 h-4 w-4 text-rose-600 border-gray-300">
                                                <label for="acepot-yes"  class="ml-3 block text-sm font-medium text-gray-700"> Yes please (+£1.00) </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="acepot-no" value="false" name="ace-pot" type="radio" class="focus:ring-rose-500 h-4 w-4 text-rose-600 border-gray-300">
                                                <label for="acepot-no" class="ml-3 block text-sm font-medium text-gray-700"> No Thanks (+0.00) </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="border-b-2 pb-2 pt-2">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="lilford-donation" class="block text-sm font-medium text-gray-700">Extra Lilford Donation? </label>
                                        <p class="text-sm text-gray-500">We are still fundraising for tee signs and teepads as well as community engagement. Thanks in advance!</p>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm"> £</span>
                                            <input type="number" min="5" max="10000" step="0.01" name="lilford-donation" id="lilford-donation" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="5.00">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


                <div class="flex justify-end">
                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500" @click="history.back()">Back</button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500" style="color: #5271fe" @click="processAndPay">Calculate total and pay</button>
                </div>
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
    mounted(){
        console.log(this.user);
        // if(this.user.paid_2022)
        // {
        //     window.location.href = '/dashboard';
        // }
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
        user(){
            return this.$page.props.user;
        },
        acepotTotalCost(){
            return "1.00";
        },
        donationCost(){
            return  (this.donation).toFixed(2);
        },
        totalCost(){
            return (20 + this.acepot + this.donation).toFixed(2);
        }
    },
    methods:{
        pay(){
            this.paymentInProgress = true;

            // unauthorised = access token wrong, so we should try and refresh

            let self = this;
            axios.post('/api/user/tournament', {
                'user_id': self.$page.props.user.id,
                'entry': 20,
                'acepot' : self.acepot,
                'donation': self.donation,
                'paymentConfirmed': false,
                'tournament_id': 3,
                'first_name': self.first_name,
                'last_name': self.last_name,
                'division': self.division,
                'pdga_number': self.pdga_number
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
                        axios.post('/api/user/tournament/confirm', {
                            "user_id": self.$page.props.user.id,
                            "order_id": response.data.order_id,
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
