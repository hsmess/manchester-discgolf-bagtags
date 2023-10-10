<template>
    <layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Tag
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Update Tag
                    </h2>
                    <div class="mt-3 pt-2 pb-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                       <div class="mt-2">
                           <p class="text-sm text-gray-500">
                               Select who just won tag number {{actual_tag.data.tag_number}} from {{actual_tag.data.owner}}...
                           </p>
                           <div class="flex-1 truncate">
                               <div class="mt-1">
                                   <select v-model="new_user" id="location" name="location" class="mt-1 block w-100 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-rose-500 focus:border-rose-500 sm:text-sm rounded-md">
                                       <option :value="null" :selected="selected_user == null">-</option>
                                       <option v-for="user in users.data" :value="user.id">{{user.name}}</option>
                                   </select>
                               </div>
                          </div>
                       </div>
                   </div>
                    <button type="button" @click="processUpdateTag()" class="w-full mb-3 inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Update Tag
                    </button>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Layouts/Layout'

    export default {
        components: {
            Layout,
        },
        data(){
            return {
                actual_tag: null,
                actual_users: null,
                new_user: null,
            }
        },
        props: {
            tag: Object,
            users: Object,
            selected_user: String,
        },
        mounted() {
            this.actual_tag = this.$props.tag;
            this.actual_users = this.$props.users;
            this.new_user = this.$props.selected_user
        },
        computed:{
            user(){
                return this.$page.props.user;
            }
        },
        methods: {
            processUpdateTag(){
                let self = this;
                axios.post('/api/tag/' + self.actual_tag.data.id + '/update', {
                    'new_user_id': self.new_user
                }).then(function (response) {
                    window.location.href = '/'
                });
            }
        }

    }
</script>
