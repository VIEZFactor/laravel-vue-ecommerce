<template>
    <div class="w-full sm:w-8/12 md:w-5/12 p-5 bg-white mt-20">
        
        <h1 class="text-3xl text-center mb-4">Login</h1>
        
        <!--<form class="mt-4" method="POST" v-on:submit.prevent="login()">-->
        <div>
            <div class="d-block flex px-2 py-4">
                <input type="email" v-model="user.email"
                placeholder="Email" name="email"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>
            <div class="d-block flex px-2 py-4">
                <input type="text" v-model="user.password"
                placeholder="Password" name="password"
                class="text-xl px-3 py-2 mr-2 w-full border-b-2 border-green-500" />
            </div>

            <button type="submit" @click="login" class="bg-green-500 w-full text-white py-3">Login</button>
        </div>
        <!--</form>-->
    </div>
</template>

<script>

    export default {
        mounted(){
            
            console.log(localStorage.getItem("access_token"));
            console.log('Hello');
        },
        data: () => ({
            user: {
                email: '',
                password: ''
            }
        }),
        methods:{
            login(){
                console.log(this.user);
                this.$store.dispatch('currentUser/loginUser', this.user);
            }
        }
    }
</script>
