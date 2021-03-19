<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Get your 2021 BagTag now
            </div>

            <div class="mt-6 text-gray-500">
                This is the place where you can sign up for your 2021 BagTag. You can either have it shipped to you, or arrange for a socially distanced collection the next time you are at the course.

                All users will sign up via the system, and your initial tag will be allocated by the size of donation you make to the Lilford campaign... So what are you waiting for!

                Please note that by purchasing a BagTag you will also become a member of Manchester Disc Golf for free.
                <inertia-link href="/buy">
                    <div class="mt-3 flex items-center text-sm font-semibold text-yellow-700">
                        <div>Get Your Tag</div>

                        <div class="ml-1 text-yellow-500">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                </inertia-link>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
    }
</script>
