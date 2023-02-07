<template>
    <layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Your Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" v-if="user.paid_2023">
                    <welcome />
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" v-else>
                    <get-your-tag />
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
            }
        }
    }
</script>
