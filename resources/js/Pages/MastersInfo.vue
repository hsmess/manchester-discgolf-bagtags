<template>
    <layout>

<!--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">-->
<!--            Hello-->
<!--        </h2>-->
        <main class="lg:relative">
            <div class="relative py-16 bg-white overflow-hidden">
                <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
                    <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                        <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                            <defs>
                                <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                </pattern>
                            </defs>
                            <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                        </svg>
                        <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                            <defs>
                                <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                </pattern>
                            </defs>
                            <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                        </svg>
                        <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                            <defs>
                                <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                </pattern>
                            </defs>
                            <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                        </svg>
                    </div>
                </div>
                <div class="relative px-4 sm:px-6 lg:px-8">
                    <div class="text-lg max-w-prose mx-auto">
                        <h1>
                            <span class="block text-base text-center font-semibold tracking-wide uppercase" style="color: #5271fe">25/26 June 2022</span>
                            <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Manchester Masters 2022</span>
                        </h1>
                        <p class="mt-8 text-xl text-gray-500 leading-8">Manchester Disc Golf is happy to announce stop 3 on the BDGA Masters Tour, The Manchester Masters. This event will take place at our new venue, Lilford Park in Leigh, Greater Manchester. This exciting new track is a great compliment to our Longford course and is the product of a great volunteer effort for the last few years.</p>
                        <figure>
                            <img class="w-full rounded-lg" src="https://dontshootdg.s3.eu-west-2.amazonaws.com/279075594_10209267272995392_8684627775694605901_n.jpeg" alt="Lilford Park"  height="400">
                            <figcaption>One of the holes at Lilford Park</figcaption>
                        </figure>
                        <p class="mt-8 text-xl text-gray-500 leading-8">Lilford Park is a mainly wooded course playing through the gorgeous public park in Westrees, Leigh that the new layout has been installed in. Expect sparse trees, slight elevation and tricky lines as well as some opportunities to watch the disc fly.</p>
                    </div>
                    <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
                        <h2 class="text-rose-500" style="margin-bottom: 10px !important;">What to expect?</h2>
                        <p>Saturday June 25 - 2 X 18 holes at Lilford Disc Golf Course</p>
                        <p>Sunday June 26 - 1 X 18 holes plus a final 9 for the top 5 in each division at Lilford Disc Golf Course</p>
                        <h2 class="text-rose-500" style="margin-bottom: 10px !important;">Divisons and costs</h2>
                        <p>We will be offering the following divisions: MP40, MP50, MP60, FP40, FP50, MA40, MA50, MA60, FA40, FA50. This event will not open up to any other divisions as the Manchester Wide Open II is following weekend.</p>
                        <p>We are finalising the course layout but everyone will play the blue course for all rounds. </p>
                        <p> Entry fee is 30 quid which covers sanctioning, course prep and funding donation, trophies and prizes </p>
                        <p> You definitely won't want to miss this one!  </p>

                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="/masters-2022/register" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10"> Sign Up Now </a>
                        </div>
                     </div>
                </div>
            </div>
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
                'tournament_id': 1,
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
