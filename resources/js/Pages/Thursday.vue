<template>
    <layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pay for Thursday Night League "subs"
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
                                                        <span class="text-xs font-semibold tracking-wide uppercase">Select number of weeks</span>
                                                        <span class="text-sm font-medium text-gray-500">Unused weeks will be refunded</span>
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
                                                        <span class="text-xs font-semibold text-rose-400 tracking-wide uppercase">Select number of weeks</span>
                                                        <span class="text-sm font-medium text-gray-500">Unused weeks will be refunded</span>
                                                      </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="relative overflow-hidden lg:flex-1">
                                            <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                                                <!-- Completed Step -->
                                                <a href="#" @click="state = 2"  class="group" v-show="state > 2">
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
                                                        <span class="text-xs font-semibold tracking-wide uppercase">Support Lilford Park</span>
                                                        <span class="text-sm font-medium text-gray-500">Contribute to our fundraiser</span>
                                                      </span>
                                                    </span>
                                                </a>
                                                <a href="#" @click="state = 2"  aria-current="step" v-show="state === 2">
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-rose-400 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-rose-400 rounded-full">
                                                          <span class="text-rose-400">02</span>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold text-rose-400 tracking-wide uppercase">Support Lilford Park</span>
                                                        <span class="text-sm font-medium text-gray-500">Contribute to our fundraiser</span>
                                                      </span>
                                                    </span>
                                                </a>
                                                <a href="#" @click="state = 2" class="group" v-show="state === 1">
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                                                          <span class="text-gray-500">02</span>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold text-gray-500 tracking-wide uppercase">Support Lilford Park</span>
                                                        <span class="text-sm font-medium text-gray-500">Contribute to our fundraiser</span>
                                                      </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="relative overflow-hidden lg:flex-1">
                                            <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                                                <!-- Upcoming Step -->
                                                <a href="#" @click="state = 3"  aria-current="step" v-show="state === 3">
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-rose-400 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-rose-400 rounded-full">
                                                          <span class="text-rose-400">03</span>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold text-rose-400 tracking-wide uppercase">Check Out</span>
                                                        <span class="text-sm font-medium text-gray-500">Complete your purchase</span>
                                                      </span>
                                                    </span>
                                                </a>
                                                <a href="#" @click="state = 3"  class="group" v-show="state < 3">
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-transparent group-hover:bg-gray-200 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                                                          <span class="text-gray-500">03</span>
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
                                        <div> {{ amountOfTickets }}x 2022 Thursday Night League "subs" - <span class="text-gray-900 text-lg">£{{ ticketTotalCost }}</span></div>
                                        <div v-if="acepot != 0"> {{ amountOfTickets }}x 2022 Thursday Night League "acepot" - <span class="text-gray-900 text-lg">£{{ acepotTotalCost }}</span></div>
                                        <div v-if="donation > 0"> 1x Lilford Park Donation - <span class="text-gray-900 text-lg">£{{ donationCost }}</span></div>
                                        <div><span class="text-gray-900 text-lg">Total: £{{totalCost}}</span></div>  </div>
                                </div>
                                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                                    <div class="md:grid md:grid-cols-3 md:gap-6">
                                        <div class="md:col-span-1">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Pay your Thursday Night League subs</h3>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Please pre-pay online to save hassle on the day. Your account will be credited with a number of "tickets" and one will be deducted when you play.
                                            </p>
                                        </div>
                                        <div class="mt-5 md:mt-0 md:col-span-2">
                                            <form class="space-y-6" action="#" method="POST">
<!--                                                <div>-->
<!--                                                    <label class="block text-sm font-medium text-gray-700">-->
<!--                                                        Profile Picture (optional)-->
<!--                                                    </label>-->
<!--                                                    <div class="mt-1 flex items-center space-x-5">-->
<!--                                                          <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">-->
<!--                                                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24" v-if="profile_picture: null">-->
<!--                                                              <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />-->
<!--                                                            </svg>-->
<!--                                                          </span>-->
<!--                                                        <button type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-300">-->
<!--                                                            Change-->
<!--                                                        </button>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                                <fieldset>
                                                    <div class="col-span-6" style="max-width: 200px;">
                                                        <label for="amountOfTickets" class="block text-sm font-medium text-gray-700">Number of weeks to buy (1-9)</label>
                                                        <input v-model="amountOfTickets" type="number" min="1" max="9" name="amountOfTickets" id="amountOfTickets" class="mt-1 focus:ring-rose-500 focus:border-rose-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </div>
                                                    <div>
                                                        <legend class="text-base font-medium text-gray-900">Ace Pot</legend>
                                                        <p class="text-sm text-gray-500">Please indicate if you will be paying into the Ace Pot. Cost is £1.00 per week.</p>
                                                    </div>
                                                    <div class="mt-4 space-y-4">
                                                        <div class="flex items-center">
                                                            <input id="yespls" :value="1" name="acepot" type="radio" v-model="acepot" class="focus:ring-rose-300 h-4 w-4 text-rose-400 border-gray-300">
                                                            <label for="yespls" class="ml-3 block text-sm font-medium text-gray-700">
                                                               Yes please
                                                            </label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="noty" :value="0" name="acepot" type="radio" v-model="acepot" class="focus:ring-rose-300 h-4 w-4 text-rose-400 border-gray-300">
                                                            <label for="noty" class="ml-3 block text-sm font-medium text-gray-700">
                                                               No thanks
                                                            </label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
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
                        <div class="mt-6 text-gray-500" v-if="state === 2">
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    Your Order
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                                    <div> {{ amountOfTickets }}x 2022 Thursday Night League "subs" - <span class="text-gray-900 text-lg">£{{ ticketTotalCost }}</span></div>
                                    <div v-if="acepot != 0"> {{ amountOfTickets }}x 2022 Thursday Night League "acepot" - <span class="text-gray-900 text-lg">£{{ acepotTotalCost }}</span></div>
                                    <div v-if="donation > 0"> 1x Lilford Park Donation - <span class="text-gray-900 text-lg">£{{ donationCost }}</span></div>
                                    <div><span class="text-gray-900 text-lg">Total: £{{totalCost}}</span></div>  </div>
                            </div>
                            <p class="mt-4 text-sm text-gray-900">
                                We are currently doing a fundraiser to support the installation of our new course in Lilford park, with the aim to put some baskets in by this summer.
                                Your <strong>initial</strong> tag will be allocated based on the amount you contribute to the fundraiser, so feel free to be generous.
                            </p>
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div>
                                <h2 class="text-gray-500 text-xs mt-5 font-medium uppercase tracking-wide">Donation Options</h2>
                                <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
                                    <li @click="donation = (3 * amountOfTickets)" class="col-span-1 flex shadow-sm rounded-md">
                                        <div class="flex-shrink-0 flex items-center justify-center w-16 bg-rose-400 text-white text-sm font-medium rounded-l-md">
                                            £{{ (3 * amountOfTickets).toFixed(2)}}
                                        </div>
                                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                                <span class="text-gray-900 font-medium hover:text-gray-600">Suggested</span>
                                                <p class="text-gray-500">£3.00 per week</p>
                                            </div>
                                            <div class="flex-shrink-0 pr-2">
                                                <button class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200 mt-2">
                                <div class="w-full flex items-center justify-between p-6 space-x-6">
                                    <div class="flex-1 truncate">
                                        <label for="donation-amount" class="block text-sm font-medium text-gray-700">Donation</label>
                                        <div class="mt-1">
                                            <input type="number" ref="donation" v-model.number="donation" min="0" step="0.01" name="donation-amount" id="donation-amount" class="max-w-sm shadow-sm focus:ring-rose-500 focus:border-rose-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="£500" aria-describedby="donation-amount">
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500" id="email-description">This will be added to your total cost.</p>
                                    </div>
                                 </div>
                            </div>
                            <div class="flex justify-end pt-6">
                                <button @click="state = 1" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-rose-400 bg-gray-800 hover:bg-gray-700 focus:outlispone-none focus:ring-2 focus:ring-offset-2 focus:ring-grey-400">
                                    Back
                                </button>
                                <button @click="state = 3" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-rose-400 hover:bg-rose-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-400">
                                    Next
                                </button>
                            </div>
                        </div>
                        <div class="mt-6 text-gray-500" v-show="state === 3">
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    Your Order
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                                    <div> {{ amountOfTickets }}x 2022 Thursday Night League "subs" - <span class="text-gray-900 text-lg">£{{ ticketTotalCost }}</span></div>
                                    <div v-if="acepot != 0"> {{ amountOfTickets }}x 2022 Thursday Night League "acepot" - <span class="text-gray-900 text-lg">£{{ acepotTotalCost }}</span></div>
                                    <div v-if="donation > 0"> 1x Lilford Park Donation - <span class="text-gray-900 text-lg">£{{ donationCost }}</span></div>
                                    <div><span class="text-gray-900 text-lg">Total: £{{totalCost}}</span></div>  </div>
                            </div>
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
            if(this.user.paid_2022)
            {
                window.location.href = '/dashboard';
            }
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
            ticketCost(){
                return this.ticket.toFixed(2);
            },
            ticketTotalCost(){
                return (this.amountOfTickets * this.ticket).toFixed(2);
            },
            acepotTotalCost(){
                return (this.amountOfTickets * this.acepot).toFixed(2);
            },
            donationCost(){
                return  (this.donation).toFixed(2);
            },
            totalCost(){
                return ((this.amountOfTickets * this.ticket) + (this.amountOfTickets * this.acepot) + this.donation).toFixed(2);
            }
        },
        methods:{
            pay(){
                this.paymentInProgress = true;

                // unauthorised = access token wrong, so we should try and refresh

                let self = this;
                axios.post('/api/user/thursday', {
                    'user_id': self.$page.props.user.id,
                    'tickets': self.amountOfTickets,
                    'acepot' : self.acepot * self.amountOfTickets,
                    'donation': self.donation,
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
                            axios.post('/api/user/thursday/confirm', {
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
                donation: 3,
                acepot: 0,
                ticket: 1,
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
                amountOfTickets: 1
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
