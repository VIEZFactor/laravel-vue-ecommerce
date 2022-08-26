<template>
    <div class="w-full sm:w-8/12 md:w-5/12 p-5 bg-white mt-20">

        
        
        <p class="text-left">

            <router-link to="/admin/users"  type="button" class="inline-flex items-center py-2 px-4 text-sm font-medium text-blue-900 bg-transparent border border-blue-900 hover:bg-blue-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-900 focus:bg-blue-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                All users
            </router-link>
        </p>

        <h1 class="text-3xl text-center mt-6">Edit user</h1>
        
        <form class="mt-4" method="POST" v-on:submit.prevent="editUser()">
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="user.name"
                placeholder="User Name" name="name"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="email" v-model="user.email"
                placeholder="Email" name="email"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>

            <button type="submit" class="bg-green-500 w-full text-white py-3">Add user</button>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                id: this.$route.params.id,
                user: []
            }
        },
        created(){
            axios.get('/api/users/'+this.id+'/edit',{ headers: {Authorization: 'Bearer ' + localStorage.access_token } })
            .then(response => this.user = response.data)
            .catch();
        },
        methods:{
            editUser(){
                axios.put('/api/users/'+this.id, { name:this.user.name, email:this.user.email }, { headers: {Authorization: 'Bearer ' + localStorage.access_token } })
                .then(response => { 
                    console.log(response);
                    this.name = '';
                    this.email = '';
                    this.$router.push('/admin/users');                        
                    this.$toasted.show('User edited successfully');
                })
                .catch(error => { console.log(error.response) });
            }
        }
    }
</script>
