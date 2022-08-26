<template>
        <div class="container mt-20">    
            
            <p class="text-left">

                <router-link to="/" type="button" class="mb-10 inline-flex items-center py-2 px-4 text-sm font-medium text-blue-900 bg-transparent border border-blue-900 hover:bg-blue-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-blue-900 focus:bg-blue-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    All products
                </router-link>
            </p>
        
            <div class="grid grid-cols-6 gap-5">
                <div class="item1 col-span-12 md:col-span-2">                    
                    <img class="max-w-full h-auto" src="img/orange.png" />
                </div>
                <div class="item1 col-span-12 md:col-span-4 flex items-center justify-center">
                    <div>
                        <h2 class="text-5xl text-center font-bold">{{product.name}}</h2>
                        <br />
                        <p class="text-lg text-center">{{product.description}}</p>
                        <br />
                        
                        <template v-if="product.status">
                            <button @click="addToCart(product)" type="button" class="m-auto block px-6 py-2.5 bg-green-600 text-white font-medium text-3xl leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                ADD TO CART
                            </button>         
                        </template>   
                        <template v-else>    
                            <button type="button" class="m-auto block px-6 py-2.5 bg-red-600 text-white font-medium text-3xl leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                                NOT AVAILABLE
                            </button>      

                        </template>           

                        <img class="object-center max-w-xs h-auto m-auto mt-6 mb-6" src="https://storage.googleapis.com/wfhq_sciencenatural/shop/secure-seals-payment.png" />
                        
                        <p class="text-sm text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sit amet libero in orci accumsan consequat. Suspendisse semper libero augue, vel euismod est convallis eget. Praesent facilisis, tortor a gravida pharetra, massa risus venenatis nisi, sit amet posuere turpis sem eu metus. Maecenas vestibulum pretium dignissim. Duis sed sapien at urna pretium mattis. Morbi a auctor massa. Suspendisse eu purus sit amet elit sodales imperdiet.                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        data(){
            return{
                id: this.$route.params.id,
                product: []
            }
        },
        created(){
            axios.get('/api/products/'+this.id+'/show')
            .then(response => {
                console.log(response);
                this.product = response.data;
            })
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
            },
            addToCart(event){
                alert('Product: '+event.name+' added to the cart');
            }
        }
    }
</script>
