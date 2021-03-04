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
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">


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
                                                        <span class="w-10 h-10 flex items-center justify-center bg-yellow-400 rounded-full">
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
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-yellow-400 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-yellow-400 rounded-full">
                                                          <span class="text-yellow-400">01</span>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold text-yellow-400 tracking-wide uppercase">Get your Tag</span>
                                                        <span class="text-sm font-medium text-gray-500">Give us some details</span>
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
                                                        <span class="w-10 h-10 flex items-center justify-center bg-yellow-400 rounded-full">
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
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-yellow-400 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-yellow-400 rounded-full">
                                                          <span class="text-yellow-400">02</span>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold text-yellow-400 tracking-wide uppercase">Support Lilford Park</span>
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
                                                    <span class="absolute top-0 left-0 w-1 h-full bg-yellow-400 lg:w-full lg:h-1 lg:bottom-0 lg:top-auto" aria-hidden="true"></span>
                                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                                      <span class="flex-shrink-0">
                                                        <span class="w-10 h-10 flex items-center justify-center border-2 border-yellow-400 rounded-full">
                                                          <span class="text-yellow-400">03</span>
                                                        </span>
                                                      </span>
                                                      <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                                        <span class="text-xs font-semibold text-yellow-400 tracking-wide uppercase">Check Out</span>
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
                                        <div> 1x 2021 Manchester Bag Tag - <span class="text-gray-900 text-lg">£{{ tagCost }}</span></div>
                                        <div v-if="collection === 'shipping'"> 1x Royal Mail Shipping - <span class="text-gray-900 text-lg">£{{shippingCost}}</span></div>
                                        <div v-if="donation > 0"> 1x Lilford Park Donation - <span class="text-gray-900 text-lg">£{{ donationCost }}</span></div>
                                        <div><span class="text-gray-900 text-lg">Total: £{{totalCost}}</span></div>            </div>
                                </div>
                                <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
                                    <div class="md:grid md:grid-cols-3 md:gap-6">
                                        <div class="md:col-span-1">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Buy your tag</h3>
                                            <p class="mt-1 text-sm text-gray-500">
                                                Please select your options, and then click next to proceed to the fundraiser.
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
<!--                                                        <button type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-300">-->
<!--                                                            Change-->
<!--                                                        </button>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                                <fieldset>
                                                    <div>
                                                        <legend class="text-base font-medium text-gray-900">Tag Delivery</legend>
                                                        <p class="text-sm text-gray-500">Please indicate if you will arrange to collect your tag or want it to be posted.</p>
                                                    </div>
                                                    <div class="mt-4 space-y-4">
                                                        <div class="flex items-center">
                                                            <input id="collection" value="collection" name="collection" type="radio" v-model="collection" class="focus:ring-yellow-300 h-4 w-4 text-yellow-400 border-gray-300">
                                                            <label for="collection" class="ml-3 block text-sm font-medium text-gray-700">
                                                                Collect from Manchester Disc Golf (+£0.00)
                                                            </label>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <input id="shipping" value="shipping" name="collection" type="radio" v-model="collection" class="focus:ring-yellow-300 h-4 w-4 text-yellow-400 border-gray-300">
                                                            <label for="shipping" class="ml-3 block text-sm font-medium text-gray-700">
                                                                Royal Mail Shipping (+£3.90)
                                                            </label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset v-if="collection === 'shipping'">
                                                    <legend class="text-base font-medium text-gray-900">Shipping Address</legend>
                                                    <p class="text-sm text-gray-500 pb-2">Please let us know where to send your tag!</p>
                                                    <div class="grid grid-cols-6 gap-6 pb-4">
                                                        <div class="col-span-6">
                                                            <label for="address_line_1" class="block text-sm font-medium text-gray-700">Address Line 1</label>
                                                            <input v-model="address_line_1" type="text" name="address_line_1" id="address_line_1" autocomplete="address_line_1" class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>
                                                        <div class="col-span-6">
                                                            <label for="address_line_2" class="block text-sm font-medium text-gray-700">Address Line 2</label>
                                                            <input  v-model="address_line_2" type="text" name="address_line_2" id="address_line_2" autocomplete="address_line_2" class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>

                                                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                                            <input v-model="city" type="text" name="city" id="city" class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>

                                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                            <label for="County" class="block text-sm font-medium text-gray-700">County</label>
                                                            <input v-model="county" type="text" name="County" id="County" class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>

                                                        <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                            <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                                                            <input v-model="postcode" type="text" name="postcode" id="postcode" autocomplete="postal-code" class="mt-1 focus:ring-yellow-500 focus:border-yellow-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button @click="state = 2" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400">
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
                                    <div> 1x 2021 Manchester Bag Tag - <span class="text-gray-900 text-lg">£{{ tagCost }}</span></div>
                                    <div v-if="collection === 'shipping'"> 1x Royal Mail Shipping - <span class="text-gray-900 text-lg">£{{shippingCost}}</span></div>
                                    <div v-if="donation > 0"> 1x Lilford Park Donation - <span class="text-gray-900 text-lg">£{{ donationCost }}</span></div>
                                    <div><span class="text-gray-900 text-lg">Total: £{{totalCost}}</span></div>
                                </div>
                            </div>
                            <p class="mt-4 text-sm text-gray-900">
                                We are currently doing a fundraiser to support the installation of our new course in Lilford park, with the aim to put some baskets in by this summer.
                                Your <strong>initial</strong> tag will be allocated based on the amount you contribute to the fundraiser, so feel free to be generous.
                                There's also some cool rewards available for specific donation amounts. Click on one to add it to your donation amount.
                            </p>
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <div>
                                <h2 class="text-gray-500 text-xs mt-5 font-medium uppercase tracking-wide">Donation Options</h2>
                                <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
                                    <li @click="donation += 50" class="col-span-1 flex shadow-sm rounded-md">
                                        <div class="flex-shrink-0 flex items-center justify-center w-16 bg-pink-600 text-white text-sm font-medium rounded-l-md">
                                            £50.00
                                        </div>
                                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                                <span class="text-gray-900 font-medium hover:text-gray-600">Lilford Disc</span>
                                                <p class="text-gray-500">Limited run!</p>
                                            </div>
                                            <div class="flex-shrink-0 pr-2">
                                                <button class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <li @click="donation += 100" class="col-span-1 flex shadow-sm rounded-md">
                                        <div class="flex-shrink-0 flex items-center justify-center w-16 bg-purple-600 text-white text-sm font-medium rounded-l-md">
                                            £100.00
                                        </div>
                                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                                <span class="text-gray-900 font-medium hover:text-gray-600">Mini Basket</span>
                                                <p class="text-gray-500">Made by Iain!</p>
                                            </div>
                                            <div class="flex-shrink-0 pr-2">
                                                <button class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <li @click="donation += 500" class="col-span-1 flex shadow-sm rounded-md">
                                        <div class="flex-shrink-0 flex items-center justify-center w-16 bg-indigo-600 text-white text-sm font-medium rounded-l-md">
                                            £500.00
                                        </div>
                                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                                <span class="text-gray-900 font-medium hover:text-gray-600">Hole Sponsor</span>
                                                <p class="text-gray-500">Make your mark!</p>
                                            </div>
                                            <div class="flex-shrink-0 pr-2">
                                                <button class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <li @click="$refs.donation.focus()" class="col-span-1 flex shadow-sm rounded-md">
                                        <div class="flex-shrink-0 flex items-center justify-center w-16 bg-red-600 text-white text-sm font-medium rounded-l-md">
                                            Custom
                                        </div>
                                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                                <span class="text-gray-900 font-medium hover:text-gray-600">Donation</span>
                                                <p class="text-gray-500">Up your start tag!</p>
                                            </div>
                                            <div class="flex-shrink-0 pr-2">
                                                <button class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
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
                                            <input type="number" ref="donation" v-model.number="donation" min="0" step="0.01" name="donation-amount" id="donation-amount" class="max-w-sm shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="£500" aria-describedby="donation-amount">
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500" id="email-description">This will be added to your tag cost.</p>
                                    </div>
                                 </div>
                            </div>
                            <div class="flex justify-end pt-6">
                                <button @click="state = 1" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-yellow-400 bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-grey-400">
                                    Back
                                </button>
                                <button @click="state = 3" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400">
                                    Next
                                </button>
                            </div>
                        </div>
                        <div class="mt-6 text-gray-500" v-if="state === 3">
                            <div class="bg-white overflow-hidden shadow rounded-lg">
                                <div class="px-4 py-5 sm:px-6">
                                    Your Order
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                                    <div> 1x 2021 Manchester Bag Tag - <span class="text-gray-900 text-lg">£{{ tagCost }}</span></div>
                                    <div v-if="collection === 'shipping'"> 1x Royal Mail Shipping - <span class="text-gray-900 text-lg">£{{shippingCost}}</span></div>
                                    <div v-if="donation > 0"> 1x Lilford Park Donation - <span class="text-gray-900 text-lg">£{{ donationCost }}</span></div>
                                    <div><span class="text-gray-900 text-lg">Total: £{{totalCost}}</span></div>
                                </div>
                            </div>
<!--                                STRIPE CHECKOUT HERE-->
                            <div class="flex justify-end pt-6">
                                <button @click="state = 1" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-yellow-400 bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-grey-400">
                                    Back
                                </button>
                                <button @click="pay()" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400">
                                    Pay
                                </button>
                            </div>
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
        computed:{
            user(){
                return this.$page.props.user;
            },
            tagCost(){
                return this.tag.toFixed(2);
            },
            shippingCost(){
                if(this.collection === 'shipping'){
                    return  this.shipping.toFixed(2);
                }
                else{
                    return 0;
                }
            },
            donationCost(){
                return this.donation.toFixed(2);
            },
            totalCost(){
                if(this.collection === 'shipping'){
                    return (this.tag + this.shipping + this.donation).toFixed(2);
                }
                else{
                    return (this.tag + this.donation).toFixed(2);
                }
            }
        },
        data() {
            return {
                state: 1,
                donation: 0,
                collection: null,
                address_line_1: null,
                address_line_2: null,
                city: null,
                county: null,
                postcode: null,
                tag: 5,
                shipping: 3.9
            }
        },
    }
</script>
